<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Photogallery;

class PhotogalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $photogalleries = Photogallery::all();

        return view('admin.content.content_photogallery', [
            'photogalleries' => $photogalleries,
            'lang' => $lang,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        if($lang != 'ru' && $lang != 'az'){
            abort(403);
        }

        return view('admin.content.content_photogallery_create', [
            'lang' => $lang,
        ]);
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
            'name' => 'required|min:3|max:255',
        ];

        $this->validate($request, $rules);

        if($lang == 'ru'){
            $photogalleries = new Phot();
        } else {
            $news = new NewsAz();
        }

        if ($request->hasFile('photo')) {
            $filename_1024 = time() . '_1024.' . $request->photo->getClientOriginalExtension();
            $path_1024 = storage_path('/app/public/images/' . $filename_1024);
            Image::make($request->photo->getRealPath())->resize(1024, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path_1024);
            $photogalleries->photo = $filename_1024;
        }

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
