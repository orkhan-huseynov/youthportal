<?php

namespace App\Http\Controllers;

use App\Models\NewsRu;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\NewsAz;
use App\Models\Photogallery;
use Carbon\Carbon;

class NewsDetailsController extends Controller
{
    public $ribbon_news_count = 30;

    public function index($lang, $id) {

        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }

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

            $news_main = NewsRu::findOrFail($id);

            $news_to_increment = NewsRu::findOrFail($id);
            $news_to_increment->view_count += 1;
            $news_to_increment->save();

            $similar_news = NewsRu::where('active', 1)
                ->where('section_id', $news_main->section_id)
                ->where('activity_start', '<=', Carbon::now())
                ->inRandomOrder()
                ->take(30)
                ->get();

            $video_of_day_news = NewsRu::whereNotNull('video_url')
                ->where('video_of_day', true)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->first();
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

            $news_main = NewsAz::findOrFail($id);

            $news_to_increment = NewsAz::findOrFail($id);
            $news_to_increment->view_count += 1;
            $news_to_increment->save();

            $similar_news = NewsAz::where('active', 1)
                ->where('section_id', $news_main->section_id)
                ->where('activity_start', '<=', Carbon::now())
                ->inRandomOrder()
                ->take(30)
                ->get();

            $video_of_day_news = NewsAz::whereNotNull('video_url')
                ->where('video_of_day', true)
                ->where('activity_start', '<=', Carbon::now())
                ->orderBy('activity_start', 'DESC')
                ->first();
        }

        $video_of_day = $this->convertYoutube($video_of_day_news->video_url);

        $news_details_text = $news_main->text;
        $replaced_images_arr = [];

        if (str_contains($news_details_text, '{PHOTO_1}') || str_contains($news_details_text, '{photo_1}')) {
            $image_1 = '<img src="'.url('storage/images/'.$news_main->image_1).'" alt="" />';
            $image_1 .= '<div class="photo_caption_container_inner"><p>' . $news_main->image_1_caption . '</p></div>';
            $news_details_text = str_ireplace('{PHOTO_1}', $image_1, $news_details_text);
            array_push($replaced_images_arr, 1);
        }
        if (str_contains($news_details_text, '{PHOTO_2}') || str_contains($news_details_text, '{photo_2}')) {
            $image_2 = '<img src="'.url('storage/images/'.$news_main->image_2).'" alt="" />';
            $image_2 .= '<div class="photo_caption_container_inner"><p>' . $news_main->image_2_caption . '</p></div>';
            $news_details_text = str_ireplace('{PHOTO_2}', $image_2, $news_details_text);
            array_push($replaced_images_arr, 2);
        }
        if (str_contains($news_details_text, '{PHOTO_3}') || str_contains($news_details_text, '{photo_3}')) {
            $image_3 = '<img src="'.url('storage/images/'.$news_main->image_3).'" alt="" />';
            $image_3 .= '<div class="photo_caption_container_inner"><p>' . $news_main->image_3_caption . '</p></div>';
            $news_details_text = str_ireplace('{PHOTO_3}', $image_3, $news_details_text);
            array_push($replaced_images_arr, 3);
        }
        if (str_contains($news_details_text, '{PHOTO_4}') || str_contains($news_details_text, '{photo_4}')) {
            $image_4 = '<img src="'.url('storage/images/'.$news_main->image_4).'" alt="" />';
            $image_4 .= '<div class="photo_caption_container_inner"><p>' . $news_main->image_4_caption . '</p></div>';
            $news_details_text = str_ireplace('{PHOTO_4}', $image_4, $news_details_text);
            array_push($replaced_images_arr, 4);
        }
        if (str_contains($news_details_text, '{PHOTO_5}') || str_contains($news_details_text, '{photo_5}')) {
            $image_5 = '<img src="'.url('storage/images/'.$news_main->image_5).'" alt="" />';
            $image_5 .= '<div class="photo_caption_container_inner"><p>' . $news_main->image_5_caption . '</p></div>';
            $news_details_text = str_ireplace('{PHOTO_5}', $image_5, $news_details_text);
            array_push($replaced_images_arr, 5);
        }
        if (str_contains($news_details_text, '{PHOTO_6}') || str_contains($news_details_text, '{photo_6}')) {
            $image_6 = '<img src="'.url('storage/images/'.$news_main->image_6).'" alt="" />';
            $image_6 .= '<div class="photo_caption_container_inner"><p>' . $news_main->image_6_caption . '</p></div>';
            $news_details_text = str_ireplace('{PHOTO_6}', $image_6, $news_details_text);
            array_push($replaced_images_arr, 6);
        }
        if (str_contains($news_details_text, '{PHOTO_7}') || str_contains($news_details_text, '{photo_7}')) {
            $image_7 = '<img src="'.url('storage/images/'.$news_main->image_7).'" alt="" />';
            $image_7 .= '<div class="photo_caption_container_inner"><p>' . $news_main->image_7_caption . '</p></div>';
            $news_details_text = str_ireplace('{PHOTO_7}', $image_7, $news_details_text);
            array_push($replaced_images_arr, 7);
        }
        if (str_contains($news_details_text, '{PHOTO_8}') || str_contains($news_details_text, '{photo_8}')) {
            $image_8 = '<img src="'.url('storage/images/'.$news_main->image_8).'" alt="" />';
            $image_8 .= '<div class="photo_caption_container_inner"><p>' . $news_main->image_8_caption . '</p></div>';
            $news_details_text = str_ireplace('{PHOTO_8}', $image_8, $news_details_text);
            array_push($replaced_images_arr, 8);
        }
        if (str_contains($news_details_text, '{PHOTO_9}') || str_contains($news_details_text, '{photo_9}')) {
            $image_9 = '<img src="'.url('storage/images/'.$news_main->image_9).'" alt="" />';
            $image_9 .= '<div class="photo_caption_container_inner"><p>' . $news_main->image_9_caption . '</p></div>';
            $news_details_text = str_ireplace('{PHOTO_9}', $image_9, $news_details_text);
            array_push($replaced_images_arr, 9);
        }
        if (str_contains($news_details_text, '{PHOTO_10}') || str_contains($news_details_text, '{photo_10}')) {
            $image_10 = '<img src="'.url('storage/images/'.$news_main->image_10).'" alt="" />';
            $image_10 .= '<div class="photo_caption_container_inner"><p>' . $news_main->image_10_caption . '</p></div>';
            $news_details_text = str_ireplace('{PHOTO_10}', $image_10, $news_details_text);
            array_push($replaced_images_arr, 10);
        }

        $video_url = '';
        if ($news_main->video_url != '') {
            $video_url = $this->convertYoutube($news_main->video_url);
        }

        return view('news_details', [
            'sections' => $sections,
            'news' => $merged_news_ribbon,
            'news_main' => $news_main,
            'news_details_text' => $news_details_text,
            'replaced_images_arr' => $replaced_images_arr,
            'video_url' => $video_url,
            'similar_news' => $similar_news,
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