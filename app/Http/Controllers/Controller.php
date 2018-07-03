<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\NewsRu;
use App\Models\NewsAz;
use App\Models\Photogallery;

use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getNewsRibbon($lang, $news_count) {
        if ($lang == 'ru') {
            $news = NewsRu::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->limit($news_count)
                ->get();
            $photogalleries = Photogallery::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            })->take($news_count);
        } else {
            $news = NewsAz::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->limit($news_count)
                ->get();
            $photogalleries = Photogallery::where('active', 1)
                ->where('activity_start', '<=', Carbon::now())
                ->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            })->take($news_count);
        }

        return $merged_news_ribbon;
    }

    protected function getVideoOfDay($lang) {
        if ($lang == 'ru') {
            $video_of_day_news = NewsRu::whereNotNull('video_url')
                ->where('video_of_day', true)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->first();
        } else {
            $video_of_day_news = NewsAz::whereNotNull('video_url')
                ->where('video_of_day', true)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->first();
        }

        return $this->convertYoutube($video_of_day_news->video_url);
    }

    protected function convertYoutube($string) {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width=\"2\" height=\"2\" src=\"//www.youtube.com/embed/$2\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>",
            $string
        );
    }
}
