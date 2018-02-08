<?php

namespace App\Http\Controllers;

use App\Models\NewsRu;
use Illuminate\Http\Request;
use App\Models\Section;

class NewsDetailsController extends Controller
{
    //

    public function index($id) {
        $sections = Section::all();
        $news_ru = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->take(50)->get();
        $news_main = NewsRu::where('id', $id)->where('active', 1)->get();

        return view('news_details', ['sections' => $sections, 'news' => $news_ru, 'news_main' => $news_main]);

    }
}