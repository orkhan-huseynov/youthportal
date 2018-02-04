<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\NewsAz;
use App\Models\NewsRu;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        if($lang == 'ru'){
            $news = NewsRu::all();
        } else if($lang == 'az') {
            $news = NewsAz::all();
        } else {
            abort(404);
        }
        $pass_data = [
            'news' => $news,
            'lang' => $lang,
        ];
        return view('admin.content.content_news', $pass_data); //test
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }
        $sections = Section::all();
        $pass_data = [
            'sections' => $sections,
            'lang' => $lang
        ];
        return view('admin.content.content_news_create', $pass_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $lang)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(404);
        }


        $rules = [
          'section' => 'required|numeric',
          //'activity_start' => 'required',
          'name' => 'required|min:3|max:255',
          'tagline' => 'required|min:3',
          'text' => 'required',
        ];

        $this->validate($request, $rules);

        if($lang == 'ru'){
            $news = new NewsRu();
        } else {
            $news = new NewsAz();
        }

        if ($request->hasFile('photo')) {
            $filename_600 = time() . '_600.' . $request->photo->getClientOriginalExtension();
            $path_600 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_600;
            Image::make($request->photo->getRealPath())->resize(600, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_600);
            $news->photo = $filename_600;

            $filename_150 = time() . '_150.' . $request->photo->getClientOriginalExtension();
            $path_150 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_150;
            Image::make($request->photo->getRealPath())->resize(150, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_150);
            $news->photo_150 = $filename_150;
        }

        if ($request->hasFile('image_1')) {
            $filename_image_1 = time() . '.' . $request->image_1->getClientOriginalExtension();
            $path_image_1 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_1;
            Image::make($request->image_1->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_1);
            $news->image_1 = $filename_image_1;
        }

        if ($request->hasFile('image_2')) {
            $filename_image_2 = time() . '.' . $request->image_2->getClientOriginalExtension();
            $path_image_2 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_2;
            Image::make($request->image_2->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_2);
            $news->image_2 = $filename_image_2;
        }

        if ($request->hasFile('image_3')) {
            $filename_image_3 = time() . '.' . $request->image_3->getClientOriginalExtension();
            $path_image_3 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_3;
            Image::make($request->image_3->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_3);
            $news->image_3 = $filename_image_3;
        }

        if ($request->hasFile('image_4')) {
            $filename_image_4 = time() . '.' . $request->image_4->getClientOriginalExtension();
            $path_image_4 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_4;
            Image::make($request->image_4->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_4);
            $news->image_4 = $filename_image_4;
        }

        if ($request->hasFile('image_5')) {
            $filename_image_5 = time() . '.' . $request->image_5->getClientOriginalExtension();
            $path_image_5 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_5;
            Image::make($request->image_5->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_5);
            $news->image_5 = $filename_image_5;
        }

        if ($request->hasFile('image_6')) {
            $filename_image_6 = time() . '.' . $request->image_6->getClientOriginalExtension();
            $path_image_6 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_6;
            Image::make($request->image_6->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_6);
            $news->image_6 = $filename_image_6;
        }

        if ($request->hasFile('image_7')) {
            $filename_image_7 = time() . '.' . $request->image_7->getClientOriginalExtension();
            $path_image_7 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_7;
            Image::make($request->image_7->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_7);
            $news->image_7 = $filename_image_7;
        }

        if ($request->hasFile('image_8')) {
            $filename_image_8 = time() . '.' . $request->image_8->getClientOriginalExtension();
            $path_image_8 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_8;
            Image::make($request->image_8->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_8);
            $news->image_8 = $filename_image_8;
        }

        if ($request->hasFile('image_9')) {
            $filename_image_9 = time() . '.' . $request->image_9->getClientOriginalExtension();
            $path_image_9 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_9;
            Image::make($request->image_9->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_9);
            $news->image_9 = $filename_image_9;
        }

        if ($request->hasFile('image_10')) {
            $filename_image_10 = time() . '.' . $request->image_10->getClientOriginalExtension();
            $path_image_10 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_10;
            Image::make($request->image_10->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_10);
            $news->image_10 = $filename_image_10;
        }

        $news->section_id = $request->section;
        $news->activity_start = Carbon::parse($request->activity_start);
        $news->activity_end = Carbon::parse($request->activity_end);
        $news->name = $request->name;
        $news->tagline = $request->tagline;
        $news->text = $request->text;
        $news->active = ($request->published == 'on');
        $news->actual = ($request->actual == 'on');
        $news->very_actual = ($request->very_actual == 'on');
        $news->important = ($request->important == 'on');
        $news->very_important = ($request->very_important == 'on');
        $news->save();

        return redirect('admin/content-news/'.$lang);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        if ($lang != 'ru' && $lang != 'az'){
            abort(404);
        }

        if ($lang == 'ru') {
            $news = NewsRu::findOrFail($id);
        } else {
            $news = NewsAz::findOrFail($id);
        }

        $sections = Section::all();

        return view('admin.content.content_news_edit', [
           'lang' => $lang,
           'news' => $news,
            'sections' => $sections,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, $id)
    {
        if ($lang != 'ru' && $lang != 'az'){
            abort(404);
        }

        $rules = [
            'section' => 'required|numeric',
            'name' => 'required|min:3|max:255',
            'tagline' => 'required|min:3',
            'text' => 'required',
        ];

        $this->validate($request, $rules);

        if ($lang == 'ru') {
            $news = NewsRu::findOrFail($id);
        } else {
            $news = NewsAz::findOrFail($id);
        }

        if ($request->hasFile('photo')) {
            $filename_600 = time() . '_600.' . $request->photo->getClientOriginalExtension();
            $path_600 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_600;
            Image::make($request->photo->getRealPath())->resize(600, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_600);
            $news->photo = $filename_600;

            $filename_150 = time() . '_150.' . $request->photo->getClientOriginalExtension();
            $path_150 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_150;
            Image::make($request->photo->getRealPath())->resize(150, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_150);
            $news->photo_150 = $filename_150;
        }

        if ($request->hasFile('image_1')) {
            $filename_image_1 = time() . '.' . $request->image_1->getClientOriginalExtension();
            $path_image_1 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_1;
            Image::make($request->image_1->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_1);
            $news->image_1 = $filename_image_1;
        }

        if ($request->hasFile('image_2')) {
            $filename_image_2 = time() . '.' . $request->image_2->getClientOriginalExtension();
            $path_image_2 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_2;
            Image::make($request->image_2->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_2);
            $news->image_2 = $filename_image_2;
        }

        if ($request->hasFile('image_3')) {
            $filename_image_3 = time() . '.' . $request->image_3->getClientOriginalExtension();
            $path_image_3 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_3;
            Image::make($request->image_3->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_3);
            $news->image_3 = $filename_image_3;
        }

        if ($request->hasFile('image_4')) {
            $filename_image_4 = time() . '.' . $request->image_4->getClientOriginalExtension();
            $path_image_4 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_4;
            Image::make($request->image_4->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_4);
            $news->image_4 = $filename_image_4;
        }

        if ($request->hasFile('image_5')) {
            $filename_image_5 = time() . '.' . $request->image_5->getClientOriginalExtension();
            $path_image_5 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_5;
            Image::make($request->image_5->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_5);
            $news->image_5 = $filename_image_5;
        }

        if ($request->hasFile('image_6')) {
            $filename_image_6 = time() . '.' . $request->image_6->getClientOriginalExtension();
            $path_image_6 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_6;
            Image::make($request->image_6->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_6);
            $news->image_6 = $filename_image_6;
        }

        if ($request->hasFile('image_7')) {
            $filename_image_7 = time() . '.' . $request->image_7->getClientOriginalExtension();
            $path_image_7 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_7;
            Image::make($request->image_7->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_7);
            $news->image_7 = $filename_image_7;
        }

        if ($request->hasFile('image_8')) {
            $filename_image_8 = time() . '.' . $request->image_8->getClientOriginalExtension();
            $path_image_8 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_8;
            Image::make($request->image_8->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_8);
            $news->image_8 = $filename_image_8;
        }

        if ($request->hasFile('image_9')) {
            $filename_image_9 = time() . '.' . $request->image_9->getClientOriginalExtension();
            $path_image_9 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_9;
            Image::make($request->image_9->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_9);
            $news->image_9 = $filename_image_9;
        }

        if ($request->hasFile('image_10')) {
            $filename_image_10 = time() . '.' . $request->image_10->getClientOriginalExtension();
            $path_image_10 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_image_10;
            Image::make($request->image_10->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_10);
            $news->image_10 = $filename_image_10;
        }

        $news->section_id = $request->section;
        $news->activity_start = Carbon::parse($request->activity_start);
        $news->activity_end = Carbon::parse($request->activity_end);
        $news->name = $request->name;
        $news->tagline = $request->tagline;
        $news->text = $request->text;
        $news->active = ($request->published == 'on');
        $news->actual = ($request->actual == 'on');
        $news->very_actual = ($request->very_actual == 'on');
        $news->important = ($request->important == 'on');
        $news->very_important = ($request->very_important == 'on');
        $news->save();

        return redirect('admin/content-news/'.$lang);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, $id)
    {
        if ($lang != 'ru' && $lang != 'az'){
            abort(404);
        }

        if ($lang == 'ru') {
            $news = NewsRu::findOrFail($id);
        } else {
            $news = NewsAz::findOrFail($id);
        }

        $news->delete();
    }
}
