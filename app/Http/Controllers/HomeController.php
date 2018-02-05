<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\NewsRu;

class HomeController extends Controller
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
    public function index()
    {
        $sections = Section::all();
        $news_ru = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->take(50)->get();
        $news_ru_very_actual = NewsRu::where('very_actual', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(1)->get();
        $news_ru_actual = NewsRu::where('actual', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
        $news_ru_view = NewsRu::where('active', 1)->orderBy('view_count', 'DESC')->orderBy('activity_start', 'DESC')->take(4)->get();
        $news_ru_very_important = NewsRu::where('very_important', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
        $news_ru_policy_main = NewsRu::where('section_id', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(1)->get();

        return view('home', ['sections' => $sections, 'news' => $news_ru, 'news_very_actual' => $news_ru_very_actual, 'news_actual' => $news_ru_actual, 'news_views' => $news_ru_view, 'news_very_important' => $news_ru_very_important, 'news_policy' => $news_ru_policy_main]);
    }
}
