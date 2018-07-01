<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\NewsRu;
use App\Models\NewsAz;
use App\Models\Photogallery;
use Carbon\Carbon;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        //$this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public $ribbon_news_count = 30;

    public function index($lang)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }
        $sections = Section::where('published', true)->orderBy('position')->get();
        if ($lang == 'ru') {
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


            $news_very_actual = NewsRu::where('very_actual', 1)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(1)
                                ->get();
            $news_actual = NewsRu::where('actual', 1)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_view = NewsRu::where('section_id', 12)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_very_important = NewsRu::where('popular', 1)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_policy_main = NewsRu::where('section_id', 1)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_economy = NewsRu::where('section_id', 9)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_sport = NewsRu::where('section_id', 5)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_education = NewsRu::where('section_id', 4)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_culture = NewsRu::where('section_id', 2)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_hightech = NewsRu::where('section_id', 6)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_world = NewsRu::where('section_id', 7)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_f1 = NewsRu::where('section_id', 10)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
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

            $news_very_actual = NewsAz::where('very_actual', 1)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(1)
                                ->get();
            $news_actual = NewsAz::where('actual', 1)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_view = NewsAz::where('section_id', 12)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_very_important = NewsAz::where('popular', 1)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_policy_main = NewsAz::where('section_id', 1)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_economy = NewsAz::where('section_id', 9)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_sport = NewsAz::where('section_id', 5)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_education = NewsAz::where('section_id', 4)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_culture = NewsAz::where('section_id', 2)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_hightech = NewsAz::where('section_id', 6)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_world = NewsAz::where('section_id', 7)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();
            $news_f1 = NewsAz::where('section_id', 10)
                                ->where('activity_start', '<=', Carbon::now())
                                ->where('active', 1)
                                ->orderBy('activity_start', 'DESC')
                                ->take(4)
                                ->get();

            $video_of_day_news = NewsAz::whereNotNull('video_url')
                                    ->where('video_of_day', true)
                                    ->where('activity_start', '<=', Carbon::now())
                                    ->orderBy('activity_start', 'DESC')
                                    ->first();
        }

        $photos = Photogallery::where('active', 1)
                    ->where('activity_start', '<=', Carbon::now())
                    ->orderBy('activity_start', 'dec')
                    ->take(4)
                    ->get();

        $video_of_day = $this->convertYoutube($video_of_day_news->video_url);

        return view('home', [
            'sections' => $sections,

            'news' => $merged_news_ribbon,
            'news_very_actual' => $news_very_actual,
            'news_actual' => $news_actual,
            'news_views' => $news_view,
            'news_very_important' => $news_very_important,
            'news_policy' => $news_policy_main,
            'news_economy' => $news_economy,
            'news_sport' => $news_sport,
            'news_education' => $news_education,
            'news_culture' => $news_culture,
            'news_hightech' => $news_hightech,
            'news_world' => $news_world,
            'news_f1' => $news_f1,

            'photos' => $photos,

            'video_of_day' => $video_of_day,

            'lang' => $lang,
        ]);
    }

    public function importNewsRu(Request $request) {
        $news = new NewsRu();
        $news->section_id = 1;
        $news->name = $request->name;
        $news->active = true;
        $news->activity_start = Carbon::parse($request->activity_start);
        $news->video_url = $request->video_url;
        $news->actual = ($request->actual == 'Да');
        $news->very_actual = ($request->very_actual == 'Да');
        $news->important = ($request->importance == 'Важная');
        $news->very_important = ($request->importance == 'Оч. важная');
        $news->photo = $request->photo;
        $news->photo_150 = '';
        $news->tagline = trim($request->tagline);
        $news->text = (trim($request->text) == '')? $this->nl2p(trim($request->tagline)) : $this->nl2p(trim($request->text));

        if ($request->photo != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo, PATHINFO_FILENAME);

            $filename_600 = time() . $fname . '_600.' . $ext;
            $path_600 = storage_path('/app/public/images/'.$filename_600);
            Image::make('http://youthportal.az/'.$request->photo)->resize(600, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_600);
            $news->photo = $filename_600;

            $filename_150 = time() . $fname . '_150.' . $ext;
            $path_150 = storage_path('/app/public/images/'.$filename_150);
            Image::make('http://youthportal.az/'.$request->photo)->resize(150, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_150);
            $news->photo_150 = $filename_150;
        }

        if ($request->photo_1 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_1, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_1, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_1_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_1)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_1 = $filename_1024;
        }

        if ($request->photo_2 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_2, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_2, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_2_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_2)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_2 = $filename_1024;
        }

        if ($request->photo_3 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_3, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_3, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_3_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_3)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_3 = $filename_1024;
        }

        if ($request->photo_4 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_4, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_4, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_4_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_4)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_4 = $filename_1024;
        }

        if ($request->photo_5 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_5, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_5, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_5_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_5)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_5 = $filename_1024;
        }

        if ($request->photo_6 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_6, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_6, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_6_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_6)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_6 = $filename_1024;
        }

        if ($request->photo_7 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_7, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_7, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_7_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_7)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_7 = $filename_1024;
        }

        if ($request->photo_8 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_8, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_8, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_8_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_8)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_8 = $filename_1024;
        }

        if ($request->photo_9 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_9, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_9, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_9_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_9)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_9 = $filename_1024;
        }

        if ($request->photo_10 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_10, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_10, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_10_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_10)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_10 = $filename_1024;
        }

        $news->save();
    }

    public function importNewsAz(Request $request) {
        $news = new NewsAz();
        $news->section_id = 9;
        $news->name = $request->name;
        $news->active = true;
        $news->activity_start = Carbon::parse($request->activity_start);
        $news->video_url = $request->video_url;
        $news->actual = ($request->actual == 'Да');
        $news->very_actual = ($request->very_actual == 'Да');
        $news->important = ($request->importance == 'Важная');
        $news->very_important = ($request->importance == 'Оч. важная');
        $news->photo = $request->photo;
        $news->photo_150 = '';
        $news->tagline = trim($request->tagline);
        $news->text = (trim($request->text) == '')? $this->nl2p(trim($request->tagline)) : $this->nl2p(trim($request->text));

        if ($request->photo != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo, PATHINFO_FILENAME);

            $filename_600 = time() . $fname . '_600.' . $ext;
            $path_600 = storage_path('/app/public/images/'.$filename_600);
            Image::make('http://youthportal.az/'.$request->photo)->resize(600, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_600);
            $news->photo = $filename_600;

            $filename_150 = time() . $fname . '_150.' . $ext;
            $path_150 = storage_path('/app/public/images/'.$filename_150);
            Image::make('http://youthportal.az/'.$request->photo)->resize(150, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_150);
            $news->photo_150 = $filename_150;
        }

        if ($request->photo_1 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_1, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_1, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_1_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_1)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_1 = $filename_1024;
        }

        if ($request->photo_2 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_2, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_2, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_2_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_2)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_2 = $filename_1024;
        }

        if ($request->photo_3 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_3, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_3, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_3_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_3)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_3 = $filename_1024;
        }

        if ($request->photo_4 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_4, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_4, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_4_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_4)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_4 = $filename_1024;
        }

        if ($request->photo_5 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_5, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_5, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_5_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_5)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_5 = $filename_1024;
        }

        if ($request->photo_6 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_6, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_6, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_6_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_6)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_6 = $filename_1024;
        }

        if ($request->photo_7 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_7, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_7, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_7_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_7)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_7 = $filename_1024;
        }

        if ($request->photo_8 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_8, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_8, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_8_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_8)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_8 = $filename_1024;
        }

        if ($request->photo_9 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_9, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_9, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_9_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_9)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_9 = $filename_1024;
        }

        if ($request->photo_10 != '') {
            $ext = pathinfo('http://youthportal.az/'.$request->photo_10, PATHINFO_EXTENSION);
            $fname = pathinfo('http://youthportal.az/'.$request->photo_10, PATHINFO_FILENAME);

            $filename_1024 = time() . $fname . '_10_1024.' . $ext;
            $path_1024 = storage_path('/app/public/images/'.$filename_1024);
            Image::make('http://youthportal.az/'.$request->photo_10)->resize(1024, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_1024);
            $news->image_10 = $filename_1024;
        }

        $news->save();
    }

    private function nl2p($string) {
        $paragraphs = '';

        foreach (explode("\n", $string) as $line) {
            if (trim($line)) {
                $paragraphs .= '<p>' . $line . '</p>';
            }
        }

        return $paragraphs;
    }

    private function convertYoutube($string) {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width=\"2\" height=\"2\" src=\"//www.youtube.com/embed/$2\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>",
            $string
        );
    }

}
