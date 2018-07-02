<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsAz;
use App\Models\NewsRu;
use App\Models\Section;
use App\Models\Photogallery;
use Carbon\Carbon;

class VideoController extends Controller
{
    public $ribbon_news_count = 30;

    public function index($lang)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }
        $sections = Section::where('published', true)->orderBy('position')->get();
        if ($lang == 'ru') {
            $videos = NewsRu::whereNotNull('video_url')
                        ->where('activity_start', '<=', Carbon::now())
                        ->where('active', 1)
                        ->orderBy('activity_start', 'DESC')
                        ->get();
        } else {
            $videos = NewsAz::whereNotNull('video_url')
                        ->where('activity_start', '<=', Carbon::now())
                        ->where('active', 1)
                        ->orderBy('activity_start', 'DESC')
                        ->get();
        }

        return view('videos', [
            'sections' => $sections,
            'news' => $this->getNewsRibbon($lang, $this->ribbon_news_count),
            'videos' => $videos,
            'lang' => $lang,

            'video_of_day' => $this->getVideoOfDay($lang),
        ]);
    }

    public function details($lang, $id)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }
        $sections = Section::where('published', true)->orderBy('position')->get();
        if ($lang == 'ru') {
            $video = NewsRu::where('id', $id)->where('active', 1)->get()->first();
            $similar_videos = NewsRu::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->whereNotNull('video_url')
                ->inRandomOrder()
                ->take(30)
                ->get();
        } else {
            $video = NewsAz::where('id', $id)->where('active', 1)->get()->first();
            $similar_videos = NewsAz::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->whereNotNull('video_url')
                ->inRandomOrder()
                ->take(30)
                ->get();
        }

        $video_url = $this->convertYoutube($video->video_url);

        return view('video_details', [
            'sections' => $sections,
            'news' => $this->getNewsRibbon($lang, $this->ribbon_news_count),
            'video' => $video,
            'video_url' => $video_url,
            'similar_videos' => $similar_videos,
            'lang' => $lang,

            'video_of_day' => $this->getVideoOfDay($lang),
        ]);
    }
}
