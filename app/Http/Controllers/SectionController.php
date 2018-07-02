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

        if ($lang == 'ru') {
            $section_news = NewsRu::where('section_id', $section_id)
                            ->where('activity_start', '<=', Carbon::now())
                            ->where('active', 1)
                            ->orderBy('activity_start', 'DESC')
                            ->paginate(46);
        } else {
            $section_news = NewsAz::where('section_id', $section_id)
                            ->where('activity_start', '<=', Carbon::now())
                            ->where('active', 1)
                            ->orderBy('activity_start', 'DESC')
                            ->paginate(46);
        }
        $sections = Section::where('published', true)->orderBy('position')->get();
        $section_name = Section::where('id', $section_id)->get();

        return view('section_news', [
            'section_news' => $section_news,
            'sections' => $sections,
            'news' => $this->getNewsRibbon($lang, $this->ribbon_news_count),
            'section_name' => $section_name,
            'section_id' => $section_id,
            'lang' => $lang,

            'video_of_day' => $this->getVideoOfDay($lang),
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
        } else {
            $section_news = NewsAz::where('activity_start', '>=', $dateStart)
                                    ->where('activity_start', '<=', $dateEnd)
                                    ->where('active', 1)
                                    ->orderBy('activity_start', 'DESC')
                                    ->paginate(46);
        }
        $sections = Section::where('published', true)->orderBy('position')->get();

        return view('news_archive', [
            'section_news' => $section_news,
            'sections' => $sections,
            'news' => $this->getNewsRibbon($lang, $this->ribbon_news_count),
            'lang' => $lang,
            'date' => Carbon::createFromTimestamp($timestamp),

            'video_of_day' => $this->getVideoOfDay($lang),
        ]);
    }
}
