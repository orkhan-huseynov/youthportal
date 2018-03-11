<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Photogallery;
use Carbon\Carbon;
use Image;

class PhotogalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photogalleries = Photogallery::all();

        return view('admin.content.content_photogallery', [
            'photogalleries' => $photogalleries,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.content.content_photogallery_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name_ru' => 'required|min:3|max:255',
            'name_az' => 'required|min:3|max:255',
            'activity_start' => 'required',
        ];

        $this->validate($request, $rules);

        $photogallery = new Photogallery();
        $photogallery->name_ru = $request->name_ru;
        $photogallery->name_az = $request->name_az;
        $photogallery->activity_start = Carbon::parse($request->activity_start);
        $photogallery->active = ($request->published == 'on');

        if ($request->hasFile('cover_photo')) {
            $filename_1024 = time() . '_1024.' . $request->cover_photo->getClientOriginalExtension();
            $path_1024 = storage_path('/app/public/images/' . $filename_1024);
            Image::make($request->cover_photo->getRealPath())->resize(1024, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path_1024);
            $photogallery->cover_photo = $filename_1024;
        }

        $photogallery->save();

        return redirect('admin/content-photogallery');

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
