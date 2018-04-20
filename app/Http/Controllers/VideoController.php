<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsAz;
use App\Models\NewsRu;
use App\Models\Section;
use App\Models\Photogallery;

class VideoController extends Controller
{
    public function index($lang)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }
        $sections = Section::where('published', true)->orderBy('position')->get();
        if($lang == 'ru') {
            $news = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->take(30)->get();
            $photogalleries = Photogallery::where('active', 1)->take(30)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            });

            $videos = NewsRu::whereNotNull('video_url')->where('active', 1)->get();

            $video_of_day_news = NewsRu::whereNotNull('video_url')->where('video_of_day', true)->first();
        } else {
            $news = NewsAz::where('active', 1)->orderBy('activity_start', 'DESC')->take(30)->get();
            $photogalleries = Photogallery::where('active', 1)->take(30)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            });

            $videos = NewsAz::whereNotNull('video_url')->where('active', 1)->get();

            $video_of_day_news = NewsAz::whereNotNull('video_url')->where('video_of_day', true)->first();
        }

        $video_of_day = $this->convertYoutube($video_of_day_news->video_url);

        return view('videos', [
            'sections' => $sections,
            'news' => $merged_news_ribbon,
            'videos' => $videos,
            'lang' => $lang,

            'video_of_day' => $video_of_day,
        ]);
    }

    public function details($lang, $id)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }
        $sections = Section::where('published', true)->orderBy('position')->get();
        if($lang == 'ru') {
            $news = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->take(30)->get();
            $photogalleries = Photogallery::where('active', 1)->take(30)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            });

            $video = NewsRu::where('id', $id)->where('active', 1)->get()->first();
            $similar_videos = NewsRu::where('active', 1)
                ->whereNotNull('video_url')
                ->inRandomOrder()
                ->take(30)
                ->get();

            $video_of_day_news = NewsRu::whereNotNull('video_url')->where('video_of_day', true)->first();
        } else {
            $news = NewsAz::where('active', 1)->orderBy('activity_start', 'DESC')->take(30)->get();
            $photogalleries = Photogallery::where('active', 1)->take(30)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            });

            $video = NewsAz::where('id', $id)->where('active', 1)->get()->first();
            $similar_videos = NewsAz::where('active', 1)
                ->whereNotNull('video_url')
                ->inRandomOrder()
                ->take(30)
                ->get();

            $video_of_day_news = NewsAz::whereNotNull('video_url')->where('video_of_day', true)->first();
        }

        $video_url = $this->convertYoutube($video->video_url);

        $video_of_day = $this->convertYoutube($video_of_day_news->video_url);

        return view('video_details', [
            'sections' => $sections,
            'news' => $merged_news_ribbon,
            'video' => $video,
            'video_url' => $video_url,
            'similar_videos' => $similar_videos,
            'lang' => $lang,

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
