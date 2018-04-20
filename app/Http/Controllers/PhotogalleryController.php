<?php

namespace App\Http\Controllers;

use App\Models\Photogallery;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\NewsRu;
use App\Models\NewsAz;

class PhotogalleryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        //$this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public $ribbon_news_count = 30;

    public function index($lang)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }

        $sections = Section::where('published', true)->orderBy('position')->get();
        if($lang == 'ru') {
            $news = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->get();
            $photogalleries = Photogallery::where('active', 1)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            })->take($this->ribbon_news_count);

            $video_of_day_news = NewsRu::whereNotNull('video_url')->where('video_of_day', true)->first();
        } else {
            $news = NewsAz::where('active', 1)->orderBy('activity_start', 'DESC')->get();
            $photogalleries = Photogallery::where('active', 1)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            })->take($this->ribbon_news_count);

            $video_of_day_news = NewsAz::whereNotNull('video_url')->where('video_of_day', true)->first();
        }

        $video_of_day = $this->convertYoutube($video_of_day_news->video_url);
        $photogalleries = Photogallery::where('active', 1)->orderBy('activity_start', 'DESC')->get();

        return view('photogallery', [
            'lang' => $lang,
            'sections' => $sections,
            'news' => $merged_news_ribbon,
            'photogalleries' => $photogalleries,

            'video_of_day' => $video_of_day,
        ]);
    }

    public function details($lang, $id)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }

        $sections = Section::where('published', true)->orderBy('position')->get();
        if($lang == 'ru') {
            $news = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->get();
            $photogalleries = Photogallery::where('active', 1)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            })->take($this->ribbon_news_count);

            $video_of_day_news = NewsRu::whereNotNull('video_url')->where('video_of_day', true)->first();
        } else {
            $news = NewsAz::where('active', 1)->orderBy('activity_start', 'DESC')->get();
            $photogalleries = Photogallery::where('active', 1)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            })->take($this->ribbon_news_count);

            $video_of_day_news = NewsAz::whereNotNull('video_url')->where('video_of_day', true)->first();
        }

        $photogallery = Photogallery::findOrFail($id);
        $photogalleries = Photogallery::where('active', 1)->orderBy('activity_start', 'DESC')->get();

        $video_of_day = $this->convertYoutube($video_of_day_news->video_url);

        return view('photogallery_details', [
            'lang' => $lang,
            'sections' => $sections,
            'news' => $merged_news_ribbon,
            'photogallery' => $photogallery,
            'photogalleries' => $photogalleries,

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
