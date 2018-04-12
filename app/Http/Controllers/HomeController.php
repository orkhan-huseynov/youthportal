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
    public function index($lang)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }
        $sections = Section::where('published', true)->orderBy('position')->get();
        if ($lang == 'ru') {
            $news = NewsRu::where('active', 1)->orderBy('activity_start', 'DESC')->take(30)->get();
            $photogalleries = Photogallery::where('active', 1)->take(30)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            });


            $news_very_actual = NewsRu::where('very_actual', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(1)->get();
            $news_actual = NewsRu::where('actual', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_view = NewsRu::where('active', 1)->orderBy('view_count', 'DESC')->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_very_important = NewsRu::where('very_important', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_policy_main = NewsRu::where('section_id', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_economy = NewsRu::where('section_id', 9)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_sport = NewsRu::where('section_id', 5)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_education = NewsRu::where('section_id', 4)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_culture = NewsRu::where('section_id', 2)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_hightech = NewsRu::where('section_id', 6)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_world = NewsRu::where('section_id', 7)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
        } else {
            $news = NewsAz::where('active', 1)->orderBy('activity_start', 'DESC')->take(30)->get();
            $photogalleries = Photogallery::where('active', 1)->take(30)->get();
            $merged_news_ribbon = $news->merge($photogalleries)->sortByDesc(function ($item) {
                return $item->activity_start;
            });

            $news_very_actual = NewsAz::where('very_actual', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(1)->get();
            $news_actual = NewsAz::where('actual', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_view = NewsAz::where('active', 1)->orderBy('view_count', 'DESC')->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_very_important = NewsAz::where('very_important', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_policy_main = NewsAz::where('section_id', 1)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_economy = NewsAz::where('section_id', 9)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_sport = NewsAz::where('section_id', 5)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_education = NewsAz::where('section_id', 4)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_culture = NewsAz::where('section_id', 2)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_hightech = NewsAz::where('section_id', 6)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
            $news_world = NewsAz::where('section_id', 7)->where('active', 1)->orderBy('activity_start', 'DESC')->take(4)->get();
        }

        $photos = Photogallery::where('active', 1)->orderBy('activity_start', 'dec')->take(4)->get();

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

            'photos' => $photos,

            'lang' => $lang,
        ]);
    }

    public function importNewsRu(Request $request) {
        $news = new NewsRu();
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

}
