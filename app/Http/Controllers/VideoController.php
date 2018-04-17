<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsAz;
use App\Models\NewsRu;
use App\Models\Section;
use App\Models\Photogallery;

class VideoController extends Controller
{
    public function index($lang)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }
        $sections = Section::where('published', true)->orderBy('position')->get();
        if($lang == 'ru') {
            $news = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->take(30)->get();
            $photogalleries = Photogallery::where('active', 1)->take(30)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            });

            $videos = NewsRu::whereNotNull('video_url')->where('active', 1)->get();

        } else {
            $news = NewsAz::where('active', 1)->orderBy('activity_start', 'DESC')->take(30)->get();
            $photogalleries = Photogallery::where('active', 1)->take(30)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            });

            $videos = NewsAz::whereNotNull('video_url')->where('active', 1)->get();
        }

        return view('videos', [
            'sections' => $sections,
            'news' => $merged_news_ribbon,
            'videos' => $videos,
            'lang' => $lang,
        ]);
    }

    public function details($lang, $id)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }
        $sections = Section::where('published', true)->orderBy('position')->get();
        if($lang == 'ru') {
            $news = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->take(30)->get();
            $photogalleries = Photogallery::where('active', 1)->take(30)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            });

            $video = NewsRu::where('id', $id)->where('active', 1)->get()->first();
            $similar_videos = NewsRu::where('active', 1)
                ->where('section_id', $video->first()->section_id)
                ->inRandomOrder()
                ->take(30)
                ->get();
        } else {
            $news = NewsAz::where('active', 1)->orderBy('activity_start', 'DESC')->take(30)->get();
            $photogalleries = Photogallery::where('active', 1)->take(30)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            });

            $video = NewsAz::where('id', $id)->where('active', 1)->get()->first();
            $similar_videos = NewsAz::where('active', 1)
                ->where('section_id', $video->first()->section_id)
                ->inRandomOrder()
                ->take(30)
                ->get();
        }

        return view('video_details', [
            'sections' => $sections,
            'news' => $merged_news_ribbon,
            'video' => $video,
            'similar_news' => $similar_videos,
            'lang' => $lang,
        ]);
    }
}
