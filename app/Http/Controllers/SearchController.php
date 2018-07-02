<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsAz;
use App\Models\NewsRu;
use App\Models\Section;
use App\Models\Photogallery;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SearchController extends Controller
{
    public $ribbon_news_count = 30;

    public function index($lang, $ss)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }

        $ss = filter_var($ss, FILTER_SANITIZE_STRING);
        if (!$ss) {
            abort(403);
        }

        $ss_array = explode(' ', $ss);

        $whereSql = '';

        $i = 0;
        foreach ($ss_array as $ss_string) {
            if ($i > 0) {
                $whereSql .= ' OR ';
            }

            $whereSql .= '(name LIKE "%' . $ss_string . '%")' . 'OR (text LIKE "%' . $ss_string . '%")';
            $i++;
        }

        $results = DB::table('news_'.$lang)
                        ->whereRaw($whereSql)
                        ->orderBy('created_at', 'desc')
                        ->get();

        $sections = Section::where('published', true)->orderBy('position')->get();

        return view('search', [
            'search_results' => $results,
            'sections' => $sections,
            'news' => $this->getNewsRibbon($lang, $this->ribbon_news_count),
            'lang' => $lang,
            'ss' => $ss,

            'video_of_day' => $this->getVideoOfDay($lang),
        ]);
    }
}
