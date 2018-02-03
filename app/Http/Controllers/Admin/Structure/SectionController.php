<?php

namespace App\Http\Controllers\Admin\Structure;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('admin.structure.structure_sections')->with('sections', $sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.structure.structure_sections_create');
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
            'name_ru' => 'required|min:2|max:255',
            'name_az' => 'required|min:2|max:255',
        ];
        $this->validate($request, $rules);

        $section = new Section;
        $section->name_ru = $request->name_ru;
        $section->name_az = $request->name_az;
        $section->published = ($request->published == 'on');

        $section->save();

        return redirect('admin/structure-sections');

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
        $section = Section::findOrFail($id);

        return view('admin.structure.structure_sections_edit')->with('section', $section);
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
        $rules = [
            'name_ru' => 'required|min:2|max:255',
            'name_az' => 'required|min:2|max:255',
            'position' => 'required|numeric',
        ];

        $this->validate($request, $rules);

        $section = Section::findOrFail($id);
        $section->name_ru = $request->name_ru;
        $section->name_az = $request->name_az;
        $section->published = ($request->published == 'on');
        $section->position = $request->position;
        $section->save();

        return redirect('admin/structure-sections');
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
