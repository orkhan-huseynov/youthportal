<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\NewsAz;
use App\Models\NewsRu;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang, $section = 1)
    {
//        if ($lang == 'ru') {
////            if ($section == 0) {
////                $news = NewsRu::all();
////            } else {
////                $news = NewsRu::where('section_id', $section)->get();
////            }
//        } else if($lang == 'az') {
//            if ($section == 0) {
//                $news = NewsAz::all();
//            } else {
//                $news = NewsAz::where('section_id', $section)->get();
//            }
//        } else {
//            abort(404);
//        }

        $sections = Section::all();

        $pass_data = [
            //'news' => $news,
            'lang' => $lang,
            'sections' => $sections,
            'currentSection' => $section,
        ];
        return view('admin.content.content_news', $pass_data); //test
    }

    public function indexApi(Request $request)
    {
        $newsFilterSection = filter_var(Input::get('newsFilterSection'), FILTER_SANITIZE_NUMBER_INT);
        $lang = filter_var(Input::get('newsFilterLang'), FILTER_SANITIZE_STRING);

        $filterArr = [];

        if ($newsFilterSection > 0) {
            array_push($filterArr, ['section_id', '=', $newsFilterSection]);
        }

        $columns = [
            'id',
            'section',
            'name',
            'published',
            'from',
            'video_of_day',
            'actuality',
            'importance',
            'popular',
            'actions',
        ];

        if ($lang == 'ru') {
            $totalData = NewsRu::where($filterArr)->count();
            $totalFiltered = $totalData;

            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');

            if (empty($request->input('search.value'))) {
                $newsQuery = NewsRu::where($filterArr)->offset($start)->limit($limit);

                if ($order == 'from') {
                    $orderByRaw = 'DATE(`activity_start`) ' . $dir;
                } else {
                    $orderByRaw = $order . ' ' . $dir;
                }

                $newsQuery->orderByRaw($orderByRaw);
            } else {
                $search = $request->input('search.value');

                $newsQuery =  NewsRu::where($filterArr)
                    ->where('id','LIKE',"%{$search}%")
                    ->orWhere('name','LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit);

                if ($order == 'from') {
                    $orderByRaw = 'DATE(`activity_start`) ' . $dir;
                } else {
                    $orderByRaw = $order . ' ' . $dir;
                }

                $newsQuery->orderByRaw($orderByRaw);
            }
        } else {
            $totalData = NewsAz::where($filterArr)->count();
            $totalFiltered = $totalData;

            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');

            if (empty($request->input('search.value'))) {
                $newsQuery = NewsAz::where($filterArr)->offset($start)->limit($limit);

                if ($order == 'from') {
                    $orderByRaw = 'DATE(`activity_start`) ' . $dir;
                } else {
                    $orderByRaw = $order . ' ' . $dir;
                }

                $newsQuery->orderByRaw($orderByRaw);
            } else {
                $search = $request->input('search.value');

                $newsQuery =  NewsAz::where($filterArr)
                    ->where('id','LIKE',"%{$search}%")
                    ->orWhere('name','LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit);

                if ($order == 'from') {
                    $orderByRaw = 'DATE(`activity_start`) ' . $dir;
                } else {
                    $orderByRaw = $order . ' ' . $dir;
                }

                $newsQuery->orderByRaw($orderByRaw);
            }
        }

        $news = $newsQuery->get();

        $data = [];
        if (!empty($news)) {
            foreach ($news as $news_item) {
                $nestedData['id'] = $news_item->id;

                $actionsHtml = '<div class="text-center"><a href="' . url('admin/content-news/' . $lang . '/' . $news_item->id . '/edit') . '"><i class="fa fa-pencil"></i></a></div>';
                //$actionsHtml .= '&nbsp;&nbsp;&nbsp;<a class="delete-link" href="javascript:void(0);" data-url="' . url('admin/content-news/' . $lang . '/' . $news_item->id) . '" data-return-url="' . url('admin/content-news/' . $lang . '/' . $news_item->section->id) . '"><i class="fa fa-trash"></i></a>';
                $nestedData['actions'] = $actionsHtml;

                $nestedData['section'] = ($lang == 'ru')? $news_item->section->name_ru : $news_item->section->name_az;
                $nestedData['name'] = $news_item->name;
                $nestedData['published'] = ($news_item->active) ? '<div class="text-center"><i class="fa fa-check"></i></div>' : '';
                $nestedData['from'] = '<span style="display:none;">' . $news_item->activity_start->format('YmdHi') . '</span>' . $news_item->activity_start->format('d.m.Y H:i');
                $nestedData['video_of_day'] = ($news_item->video_of_day) ? '<div class="text-center"><i class="fa fa-check"></i></div>' : '';
                $nestedData['actuality'] = ($news_item->very_actual) ? '<div class="text-center">Very actual</div>' : (($news_item->actual) ? '<div class="text-center">Actual</div>' : '');
                $nestedData['importance'] = ($news_item->very_important) ? '<div class="text-center">Very important</div>' : (($news_item->important) ? '<div class="text-center">Important</div>' : '');
                $nestedData['popular'] = ($news_item->popular) ? '<div class="text-center"><i class="fa fa-check"></i></div>' : '';

                $data[] = $nestedData;
            }
        }

        return response()->json([
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,
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
            //$path_600 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_600;
            $path_600 = storage_path('/app/public/images/'.$filename_600);
            Image::make($request->photo->getRealPath())->resize(600, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_600);
            $news->photo = $filename_600;

            $filename_150 = time() . '_150.' . $request->photo->getClientOriginalExtension();
            //$path_150 = '/var/www/html/huseynov.us/public_html/yp/storage/app/public/images/'.$filename_150;
            $path_150 = storage_path('/app/public/images/'.$filename_150);
            Image::make($request->photo->getRealPath())->resize(150, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_150);
            $news->photo_150 = $filename_150;
        }

        if ($request->hasFile('image_1')) {
            $filename_image_1 = time() . '_1' . '.' . $request->image_1->getClientOriginalExtension();
            $path_image_1 = storage_path('/app/public/images/'.$filename_image_1);
            Image::make($request->image_1->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_1);
            $news->image_1 = $filename_image_1;
            $news->image_1_caption = $request->image_1_caption;
        }

        if ($request->hasFile('image_2')) {
            $filename_image_2 = time() . '_2' . '.' . $request->image_2->getClientOriginalExtension();
            $path_image_2 = storage_path('/app/public/images/'.$filename_image_2);
            Image::make($request->image_2->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_2);
            $news->image_2 = $filename_image_2;
            $news->image_2_caption = $request->image_2_caption;
        }

        if ($request->hasFile('image_3')) {
            $filename_image_3 = time() . '_3' . '.' . $request->image_3->getClientOriginalExtension();
            $path_image_3 = storage_path('/app/public/images/'.$filename_image_3);
            Image::make($request->image_3->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_3);
            $news->image_3 = $filename_image_3;
            $news->image_3_caption = $request->image_3_caption;
        }

        if ($request->hasFile('image_4')) {
            $filename_image_4 = time() . '_4' . '.' . $request->image_4->getClientOriginalExtension();
            $path_image_4 = storage_path('/app/public/images/'.$filename_image_4);
            Image::make($request->image_4->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_4);
            $news->image_4 = $filename_image_4;
            $news->image_4_caption = $request->image_4_caption;
        }

        if ($request->hasFile('image_5')) {
            $filename_image_5 = time() . '_5' . '.' . $request->image_5->getClientOriginalExtension();
            $path_image_5 = storage_path('/app/public/images/'.$filename_image_5);
            Image::make($request->image_5->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_5);
            $news->image_5 = $filename_image_5;
            $news->image_5_caption = $request->image_5_caption;
        }

        if ($request->hasFile('image_6')) {
            $filename_image_6 = time() . '_6' . '.' . $request->image_6->getClientOriginalExtension();
            $path_image_6 = storage_path('/app/public/images/'.$filename_image_6);
            Image::make($request->image_6->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_6);
            $news->image_6 = $filename_image_6;
            $news->image_6_caption = $request->image_6_caption;
        }

        if ($request->hasFile('image_7')) {
            $filename_image_7 = time() . '_7' . '.' . $request->image_7->getClientOriginalExtension();
            $path_image_7 = storage_path('/app/public/images/'.$filename_image_7);
            Image::make($request->image_7->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_7);
            $news->image_7 = $filename_image_7;
            $news->image_7_caption = $request->image_7_caption;
        }

        if ($request->hasFile('image_8')) {
            $filename_image_8 = time() . '_8' . '.' . $request->image_8->getClientOriginalExtension();
            $path_image_8 = storage_path('/app/public/images/'.$filename_image_8);
            Image::make($request->image_8->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_8);
            $news->image_8 = $filename_image_8;
            $news->image_8_caption = $request->image_8_caption;
        }

        if ($request->hasFile('image_9')) {
            $filename_image_9 = time() . '_9' . '.' . $request->image_9->getClientOriginalExtension();
            $path_image_9 = storage_path('/app/public/images/'.$filename_image_9);
            Image::make($request->image_9->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_9);
            $news->image_9 = $filename_image_9;
            $news->image_9_caption = $request->image_9_caption;
        }

        if ($request->hasFile('image_10')) {
            $filename_image_10 = time() . '_10' . '.' . $request->image_10->getClientOriginalExtension();
            $path_image_10 = storage_path('/app/public/images/'.$filename_image_10);
            Image::make($request->image_10->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_10);
            $news->image_10 = $filename_image_10;
            $news->image_10_caption = $request->image_10_caption;
        }

        $news->section_id = $request->section;
        $news->activity_start = Carbon::parse($request->activity_start);
        $news->activity_end = Carbon::parse($request->activity_end);
        $news->name = $request->name;
        $news->video_url = $request->video_url;
        $news->tagline = $request->tagline;
        $news->text = $request->text;
        $news->active = ($request->published == 'on');
        $news->actual = ($request->actual == 'on');
        $news->very_actual = ($request->very_actual == 'on');
        $news->important = ($request->important == 'on');
        $news->very_important = ($request->very_important == 'on');
        $news->popular = ($request->popular == 'on');
        $news->video_of_day = ($request->video_of_day == 'on');
        $news->tags = $request->tags;
        $news->save();

        return redirect('admin/content-news/'.$lang.'/'.$request->section);
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
            $path_600 = storage_path('/app/public/images/'.$filename_600);
            Image::make($request->photo->getRealPath())->resize(600, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_600);
            $news->photo = $filename_600;

            $filename_150 = time() . '_150.' . $request->photo->getClientOriginalExtension();
            $path_150 = storage_path('/app/public/images/'.$filename_150);
            Image::make($request->photo->getRealPath())->resize(150, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_150);
            $news->photo_150 = $filename_150;
        }

        if ($request->hasFile('image_1')) {
            $filename_image_1 = time() . '_1' . '.' . $request->image_1->getClientOriginalExtension();
            $path_image_1 = storage_path('/app/public/images/'.$filename_image_1);
            Image::make($request->image_1->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_1);
            $news->image_1 = $filename_image_1;
        }

        if ($request->has('image_1_caption')) {
            $news->image_1_caption = $request->image_1_caption;
        }

        if ($request->hasFile('image_2')) {
            $filename_image_2 = time() . '_2' . '.' . $request->image_2->getClientOriginalExtension();
            $path_image_2 = storage_path('/app/public/images/'.$filename_image_2);
            Image::make($request->image_2->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_2);
            $news->image_2 = $filename_image_2;
        }

        if ($request->has('image_2_caption')) {
            $news->image_2_caption = $request->image_2_caption;
        }

        if ($request->hasFile('image_3')) {
            $filename_image_3 = time() . '_3' . '.' . $request->image_3->getClientOriginalExtension();
            $path_image_3 = storage_path('/app/public/images/'.$filename_image_3);
            Image::make($request->image_3->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_3);
            $news->image_3 = $filename_image_3;
        }

        if ($request->has('image_3_caption')) {
            $news->image_3_caption = $request->image_3_caption;
        }

        if ($request->hasFile('image_4')) {
            $filename_image_4 = time() . '_4' . '.' . $request->image_4->getClientOriginalExtension();
            $path_image_4 = storage_path('/app/public/images/'.$filename_image_4);
            Image::make($request->image_4->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_4);
            $news->image_4 = $filename_image_4;
        }

        if ($request->has('image_4_caption')) {
            $news->image_4_caption = $request->image_4_caption;
        }

        if ($request->hasFile('image_5')) {
            $filename_image_5 = time() . '_5' . '.' . $request->image_5->getClientOriginalExtension();
            $path_image_5 = storage_path('/app/public/images/'.$filename_image_5);
            Image::make($request->image_5->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_5);
            $news->image_5 = $filename_image_5;
        }

        if ($request->has('image_5_caption')) {
            $news->image_5_caption = $request->image_5_caption;
        }

        if ($request->hasFile('image_6')) {
            $filename_image_6 = time() . '_6' . '.' . $request->image_6->getClientOriginalExtension();
            $path_image_6 = storage_path('/app/public/images/'.$filename_image_6);
            Image::make($request->image_6->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_6);
            $news->image_6 = $filename_image_6;
        }

        if ($request->has('image_6_caption')) {
            $news->image_6_caption = $request->image_6_caption;
        }

        if ($request->hasFile('image_7')) {
            $filename_image_7 = time() . '_7' . '.' . $request->image_7->getClientOriginalExtension();
            $path_image_7 = storage_path('/app/public/images/'.$filename_image_7);
            Image::make($request->image_7->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_7);
            $news->image_7 = $filename_image_7;
        }

        if ($request->has('image_7_caption')) {
            $news->image_7_caption = $request->image_7_caption;
        }

        if ($request->hasFile('image_8')) {
            $filename_image_8 = time() . '_8' . '.' . $request->image_8->getClientOriginalExtension();
            $path_image_8 = storage_path('/app/public/images/'.$filename_image_8);
            Image::make($request->image_8->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_8);
            $news->image_8 = $filename_image_8;
        }

        if ($request->has('image_8_caption')) {
            $news->image_8_caption = $request->image_8_caption;
        }

        if ($request->hasFile('image_9')) {
            $filename_image_9 = time() . '_9' . '.' . $request->image_9->getClientOriginalExtension();
            $path_image_9 = storage_path('/app/public/images/'.$filename_image_9);
            Image::make($request->image_9->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_9);
            $news->image_9 = $filename_image_9;
        }

        if ($request->has('image_9_caption')) {
            $news->image_9_caption = $request->image_9_caption;
        }

        if ($request->hasFile('image_10')) {
            $filename_image_10 = time() . '_10' . '.' . $request->image_10->getClientOriginalExtension();
            $path_image_10 = storage_path('/app/public/images/'.$filename_image_10);
            Image::make($request->image_10->getRealPath())->resize(800, null, function($constraint){
                $constraint->aspectRatio();
            })->save($path_image_10);
            $news->image_10 = $filename_image_10;
        }

        if ($request->has('image_10_caption')) {
            $news->image_10_caption = $request->image_10_caption;
        }

        $news->section_id = $request->section;
        $news->activity_start = Carbon::parse($request->activity_start);
        $news->activity_end = Carbon::parse($request->activity_end);
        $news->name = $request->name;
        $news->video_url = $request->video_url;
        $news->tagline = $request->tagline;
        $news->text = $request->text;
        $news->active = ($request->published == 'on');
        $news->actual = ($request->actual == 'on');
        $news->very_actual = ($request->very_actual == 'on');
        $news->important = ($request->important == 'on');
        $news->very_important = ($request->very_important == 'on');
        $news->popular = ($request->popular == 'on');
        $news->video_of_day = ($request->video_of_day == 'on');
        $news->tags = $request->tags;
        $news->save();

        return redirect('admin/content-news/'.$lang.'/'.$request->section);

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

    function bulkDeleteNews(Request $request)
    {
        try {
            $news = $request->news;
            $lang = $request->lang;

            foreach ($news as $news_item) {
                $newsId = $news_item[0];

                if ($lang == 'ru') {
                    $newsObject = NewsRu::findOrFail($newsId);
                } elseif ($lang == 'az') {
                    $newsObject = NewsAz::findOrFail($newsId);
                } else {
                    continue;
                }

                $newsObject->delete();
            }
        } catch (\Exception $e) {
            return response()->json([
                'responseCode' => 2,
                'message' => $e->getMessage(),
            ]);
        }

        return response()->json([
            'responseCode' => 1,
            'message' => 'ok',
        ]);
    }
}
