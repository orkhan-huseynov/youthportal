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
        } else {
            $news = NewsAz::where('active', 1)->orderBy('activity_start', 'DESC')->get();
            $photogalleries = Photogallery::where('active', 1)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            })->take($this->ribbon_news_count);
        }

        $photogalleries = Photogallery::where('active', 1)->orderBy('activity_start', 'DESC')->get();

        return view('photogallery', [
            'lang' => $lang,
            'sections' => $sections,
            'news' => $merged_news_ribbon,
            'photogalleries' => $photogalleries,
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
        } else {
            $news = NewsAz::where('active', 1)->orderBy('activity_start', 'DESC')->get();
            $photogalleries = Photogallery::where('active', 1)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            })->take($this->ribbon_news_count);
        }

        $photogallery = Photogallery::findOrFail($id);
        $photogalleries = Photogallery::where('active', 1)->orderBy('activity_start', 'DESC')->get();

        return view('photogallery_details', [
            'lang' => $lang,
            'sections' => $sections,
            'news' => $merged_news_ribbon,
            'photogallery' => $photogallery,
            'photogalleries' => $photogalleries,
        ]);
    }
}
