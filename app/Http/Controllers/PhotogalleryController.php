<?php

namespace App\Http\Controllers;

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
    public function index($lang)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }

        $sections = Section::all();
        if($lang == 'ru') {
            $news = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->take(50)->get();
        } else {
            $news = NewsAz::where('active', 1)->orderBy('activity_start', 'DESC')->take(50)->get();
        }

        return view('photogallery', [
            'lang' => $lang,
            'sections' => $sections,
            'news' => $news,
        ]);
    }
}
