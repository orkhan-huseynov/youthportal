<?php

namespace App\Http\Controllers\Admin\Structure;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.structure.structure_pages')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.structure.structure_pages_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title_en' => 'required|min:3|max:255',
            'title_ru' => 'required|min:3|max:255',
            'title_az' => 'required|min:3|max:255',
            'text_en' => 'required|min:3',
            'text_ru' => 'required|min:3',
            'text_az' => 'required|min:3',
            'slug' => 'required'
        );
        $this->validate($request, $rules);
        
        $page = new Page;
        $page->title_en = $request->title_en;
        $page->title_ru = $request->title_ru;
        $page->title_az = $request->title_az;
        $page->text_en = $request->text_en;
        $page->text_ru = $request->text_ru;
        $page->text_az = $request->text_az;
        $page->slug = $request->slug;
        $page->published = ($request->has('published'))?1:0;
        $page->save();
        
        return redirect('admin/structure-pages');
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
        $page = Page::FindOrFail($id);
        
        $data_array = array(
            'page' => $page
        );
        
        return view('admin.structure.structure_pages_edit', $data_array);
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
        $rules = array(
            'title_en' => 'required|min:3|max:255',
            'title_ru' => 'required|min:3|max:255',
            'title_az' => 'required|min:3|max:255',
            'text_en' => 'required|min:3',
            'text_ru' => 'required|min:3',
            'text_az' => 'required|min:3',
            'slug' => 'required'
        );
        $this->validate($request, $rules);
        
        $page = Page::FindOrFail($id);
        $page->title_en = $request->title_en;
        $page->title_ru = $request->title_ru;
        $page->title_az = $request->title_az;
        $page->text_en = $request->text_en;
        $page->text_ru = $request->text_ru;
        $page->text_az = $request->text_az;
        $page->slug = $request->slug;
        $page->published = ($request->has('published'))?1:0;
        $page->save();
        
        return redirect('admin/structure-pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::FindOrFail($id);
        $page->delete();
    }
}
