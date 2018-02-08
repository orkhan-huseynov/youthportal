<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\NewsRu;
use App\Models\NewsAz;

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
    public function index($lang)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }

        $sections = Section::all();
        if ($lang == 'ru') {
            $news = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->take(50)->get();
            $news_very_actual = NewsRu::where('very_actual', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(1)->get();
            $news_actual = NewsRu::where('actual', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_view = NewsRu::where('active', 1)->orderBy('view_count', 'DESC')->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_very_important = NewsRu::where('very_important', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_policy_main = NewsRu::where('section_id', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_economy = NewsRu::where('section_id', 3)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_sport = NewsRu::where('section_id', 5)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_education = NewsRu::where('section_id', 4)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_culture = NewsRu::where('section_id', 2)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_hightech = NewsRu::where('section_id', 6)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_world = NewsRu::where('section_id', 7)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
        }else{
            $news = NewsAz::where('active', 1)->orderBy('activity_start', 'DESC')->take(50)->get();
            $news_very_actual = NewsAz::where('very_actual', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(1)->get();
            $news_actual = NewsAz::where('actual', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_view = NewsAz::where('active', 1)->orderBy('view_count', 'DESC')->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_very_important = NewsAz::where('very_important', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_policy_main = NewsAz::where('section_id', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_economy = NewsAz::where('section_id', 3)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_sport = NewsAz::where('section_id', 5)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_education = NewsAz::where('section_id', 4)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_culture = NewsAz::where('section_id', 2)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_hightech = NewsAz::where('section_id', 6)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_world = NewsAz::where('section_id', 7)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
        }


        return view('home', [
            'sections' => $sections,
            'news' => $news,
            'news_very_actual' => $news_very_actual,
            'news_actual' => $news_actual,
            'news_views' => $news_view,
            'news_very_important' => $news_very_important,
            'news_policy' => $news_policy_main,
            'news_economy' => $news_economy,
            'news_sport' => $news_sport,
            'news_education' => $news_education,
            'news_culture' => $news_culture,
            'news_hightech' => $news_hightech,
            'news_world' => $news_world,
            'lang' => $lang,
        ]);
    }
}
