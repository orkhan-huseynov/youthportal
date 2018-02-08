<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsRu;
use App\Models\Section;
use App\Models\NewsAz;

class SectionController extends Controller
{
    //

    public function index($lang, $section_id) {

        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }

        if($lang == 'ru'){
            $section_news = NewsRu::where('section_id', $section_id)->where('active', 1)->orderBy('activity_start', 'DESC')->get();
            $news = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->take(50)->get();
        } else {
            $section_news = NewsAz::where('section_id', $section_id)->where('active', 1)->orderBy('activity_start', 'DESC')->get();
            $news = NewsAz::where('active', 1)->orderBy('activity_start', 'DESC')->take(50)->get();
        }
        $sections = Section::all();
        $section_name = Section::where('id', $section_id)->get();

        return view('section_news', [
            'section_news' => $section_news,
            'sections' => $sections,
            'news' => $news,
            'section_name' => $section_name,
            'section_id' => $section_id,
            'lang' => $lang,
        ]);
    }
}
