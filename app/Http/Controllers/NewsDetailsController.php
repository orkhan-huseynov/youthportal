<?php

namespace App\Http\Controllers;

use App\Models\NewsRu;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\NewsAz;

class NewsDetailsController extends Controller
{
    //

    public function index($id, $lang) {

        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }

        $sections = Section::all();
        if($lang == 'ru') {
            $news = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->take(50)->get();
            $news_main = NewsRu::where('id', $id)->where('active', 1)->get();
        } else {
            $news = NewsAz::where('active', 1)->orderBy('activity_start', 'DESC')->take(50)->get();
            $news_main = NewsAz::where('id', $id)->where('active', 1)->get();
        }

        return view('news_details', ['sections' => $sections,
            'news' => $news,
            'news_main' => $news_main,
            'lang' => $lang,
        ]);

    }
}