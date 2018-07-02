<?php

namespace App\Http\Controllers;

use App\Models\Photogallery;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\NewsRu;
use App\Models\NewsAz;
use Carbon\Carbon;

class PhotogalleryController extends Controller
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

        $photogalleries = Photogallery::where('active', 1)
                            ->where('activity_start', '<=', Carbon::now())
                            ->orderBy('activity_start', 'DESC')
                            ->get();

        return view('photogallery', [
            'lang' => $lang,
            'sections' => $sections,
            'news' => $this->getNewsRibbon($lang, $this->ribbon_news_count),
            'photogalleries' => $photogalleries,

            'video_of_day' => $this->getVideoOfDay($lang),
        ]);
    }

    public function details($lang, $id)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }

        $sections = Section::where('published', true)->orderBy('position')->get();

        $photogallery = Photogallery::findOrFail($id);
        $photogalleries = Photogallery::where('active', 1)
                        ->where('activity_start', '<=', Carbon::now())
                        ->orderBy('activity_start', 'DESC')
                        ->get();

        return view('photogallery_details', [
            'lang' => $lang,
            'sections' => $sections,
            'news' => $this->getNewsRibbon($lang, $this->ribbon_news_count),
            'photogallery' => $photogallery,
            'photogalleries' => $photogalleries,

            'video_of_day' => $this->getVideoOfDay($lang),
        ]);
    }
}
