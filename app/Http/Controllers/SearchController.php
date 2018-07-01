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
                        ->get();

        $sections = Section::where('published', true)->orderBy('position')->get();
        if($lang == 'ru') {
            $news = NewsRu::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->get();
            $photogalleries = Photogallery::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            })->take($this->ribbon_news_count);

            $video_of_day_news = NewsRu::whereNotNull('video_url')->where('video_of_day', true)->first();
        } else {
            $news = NewsAz::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->get();
            $photogalleries = Photogallery::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            })->take($this->ribbon_news_count);

            $video_of_day_news = NewsAz::whereNotNull('video_url')->where('video_of_day', true)->first();
        }

        $video_of_day = $this->convertYoutube($video_of_day_news->video_url);

        return view('search', [
            'search_results' => $results,
            'sections' => $sections,
            'news' => $merged_news_ribbon,
            'lang' => $lang,
            'ss' => $ss,

            'video_of_day' => $video_of_day,
        ]);
    }

    private function convertYoutube($string) {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width=\"2\" height=\"2\" src=\"//www.youtube.com/embed/$2\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>",
            $string
        );
    }
}
