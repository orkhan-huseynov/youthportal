<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsAz;
use App\Models\NewsRu;
use App\Models\Section;
use App\Models\Photogallery;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
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
                        ->get();

        $sections = Section::where('published', true)->orderBy('position')->get();
        if($lang == 'ru') {
            $news = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->take(30)->get();
            $photogalleries = Photogallery::where('active', 1)->take(30)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            });
        } else {
            $news = NewsAz::where('active', 1)->orderBy('activity_start', 'DESC')->take(30)->get();
            $photogalleries = Photogallery::where('active', 1)->take(30)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            });
        }


        return view('search', [
            'search_results' => $results,
            'sections' => $sections,
            'news' => $merged_news_ribbon,
            'lang' => $lang,
            'ss' => $ss,
        ]);
    }
}
