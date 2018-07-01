<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsRu;
use App\Models\Section;
use App\Models\NewsAz;
use App\Models\Photogallery;
use Carbon\Carbon;

class SectionController extends Controller
{
    public $ribbon_news_count = 30;

    public function index($lang, $section_id) {

        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }

        if($lang == 'ru'){
            $section_news = NewsRu::where('section_id', $section_id)
                ->where('activity_start', '<=', Carbon::now())
                ->where('active', 1)
                ->orderBy('activity_start', 'DESC')
                ->paginate(46);

            $news = NewsRu::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->get();
            $photogalleries = Photogallery::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            })->take($this->ribbon_news_count);

            $video_of_day_news = NewsRu::whereNotNull('video_url')
                ->where('video_of_day', true)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->first();
        } else {
            $section_news = NewsAz::where('section_id', $section_id)
                ->where('activity_start', '<=', Carbon::now())
                ->where('active', 1)
                ->orderBy('activity_start', 'DESC')
                ->paginate(46);

            $news = NewsAz::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->get();
            $photogalleries = Photogallery::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            })->take($this->ribbon_news_count);

            $video_of_day_news = NewsAz::whereNotNull('video_url')
                ->where('video_of_day', true)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->first();
        }
        $sections = Section::where('published', true)->orderBy('position')->get();
        $section_name = Section::where('id', $section_id)->get();

        $video_of_day = $this->convertYoutube($video_of_day_news->video_url);

        return view('section_news', [
            'section_news' => $section_news,
            'sections' => $sections,
            'news' => $merged_news_ribbon,
            'section_name' => $section_name,
            'section_id' => $section_id,
            'lang' => $lang,

            'video_of_day' => $video_of_day,
        ]);
    }

    public function newsArchive($lang, $timestamp) {

        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }

        $timestamp = filter_var($timestamp, FILTER_SANITIZE_NUMBER_INT);
        $dateStart = Carbon::createFromTimestamp($timestamp)->startOfDay();
        $dateEnd = Carbon::createFromTimestamp($timestamp)->endOfDay();

        if($lang == 'ru'){
            $section_news = NewsRu::where('activity_start', '>=', $dateStart)
                ->where('activity_start', '<=', $dateEnd)
                ->where('active', 1)
                ->orderBy('activity_start', 'DESC')
                ->paginate(46);

            $news = NewsRu::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->get();
            $photogalleries = Photogallery::where('active', 1)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            })->take($this->ribbon_news_count);

            $video_of_day_news = NewsRu::whereNotNull('video_url')
                ->where('video_of_day', true)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->first();
        } else {
            $section_news = NewsAz::where('activity_start', '>=', $dateStart)
                ->where('activity_start', '<=', $dateEnd)
                ->where('active', 1)
                ->orderBy('activity_start', 'DESC')
                ->paginate(46);

            $news = NewsAz::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->get();
            $photogalleries = Photogallery::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            })->take($this->ribbon_news_count);

            $video_of_day_news = NewsAz::whereNotNull('video_url')
                ->where('video_of_day', true)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->first();
        }
        $sections = Section::where('published', true)->orderBy('position')->get();

        $video_of_day = $this->convertYoutube($video_of_day_news->video_url);

        return view('news_archive', [
            'section_news' => $section_news,
            'sections' => $sections,
            'news' => $merged_news_ribbon,
            'lang' => $lang,
            'date' => Carbon::createFromTimestamp($timestamp),

            'video_of_day' => $video_of_day,
        ]);
    }

    private function convertYoutube($string) {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width=\"2\" height=\"2\" src=\"//www.youtube.com/embed/$2\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>",
            $string
        );
    }
}
