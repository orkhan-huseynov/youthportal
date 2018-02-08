<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsRu;
use App\Models\Section;

class SectionController extends Controller
{
    //

    public function index($section_id) {

        $section_news = NewsRu::where('section_id', $section_id)->where('active', 1)->orderBy('activity_start', 'DESC')->get();
        $sections = Section::all();
        $news = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->take(50)->get();
        $section_name = Section::where('id', $section_id)->get();

        return view('section_news', ['section_news' => $section_news, 'sections' => $sections, 'news' => $news, 'section_name' => $section_name]);
    }
}
