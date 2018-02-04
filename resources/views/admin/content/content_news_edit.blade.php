@extends('admin.layouts.layout')

@section('title', 'News')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    News
                </h3>
            </div>

            <div class="title_right">
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit news</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="newsEditForm" class="form-horizontal form-label-left" action="{{url('admin/content-news/'.$lang.'/'.$news->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="newsTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="element-tab" role="tab" data-toggle="tab" aria-expanded="true">Element</a></li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="tagline-tab" data-toggle="tab" aria-expanded="false">Tagline</a></li>
                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="details-tab" data-toggle="tab" aria-expanded="false">Details</a></li>
                                    <li role="presentation" class=""><a href="#tab_content4" role="tab" id="image-tab" data-toggle="tab" aria-expanded="false">Image</a></li>
                                </ul>
                                <div id="newsTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="element-tab">
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="section">Section</label>
                                            <div class="col-md-6 col-sm-6 col-xs-6 to_left">
                                                <select id="newsSectionSelect" class="js-switch form-control col-md-7 col-xs-12" minlength="3" name="section">
                                                    <option value="0">Choose Section</option>
                                                    @foreach ($sections as $section)
                                                        <option @if (old('section', $news->section_id) == $section->id) selected @endif value="{{$section->id}}">{{$section->name_ru}}</option>
                                                    @endforeach

                                                </select>
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('section')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="published">Published</label>
                                            <div class="col-md-11 col-sm-11 col-xs-11 to_left">
                                                <input id="published" class="js-switch form-control col-md-7 col-xs-12" minlength="3" name="published" type="checkbox" @if (old('published', $news->active) == 'on')  checked @endif>
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('published')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="published">Actual</label>
                                            <div class="col-md-11 col-sm-11 col-xs-11 to_left">
                                                <input id="actual" class="js-switch form-control col-md-7 col-xs-12" minlength="3" name="actual" type="checkbox" @if (old('actual', $news->actual) == 'on')  checked @endif>
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('actual')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="published">Very actual</label>
                                            <div class="col-md-11 col-sm-11 col-xs-11 to_left">
                                                <input id="very_actual" class="js-switch form-control col-md-7 col-xs-12" minlength="3" name="very_actual" type="checkbox" @if (old('very_actual', $news->very_actual) == 'on')  checked @endif>
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('very_actual')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="published">Important</label>
                                            <div class="col-md-11 col-sm-11 col-xs-11 to_left">
                                                <input id="important" class="js-switch form-control col-md-7 col-xs-12" minlength="3" name="important" type="checkbox" @if (old('important', $news->important) == 'on')  checked @endif>
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('important')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="published">Very important</label>
                                            <div class="col-md-11 col-sm-11 col-xs-11 to_left">
                                                <input id="very_important" class="js-switch form-control col-md-7 col-xs-12" minlength="3" name="very_important" type="checkbox" @if (old('very_important', $news->very_important) == 'on')  checked @endif>
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('very_important')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                                <div class="control-group">
                                                    <div class="controls container-fluid">
                                                        <div class="row">
                                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="activity_start">From</label>
                                                            <div class="col-sm-6 xdisplay_inputx form-group has-feedback">
                                                                <input id="newsCreateActivityStart" name="activity_start" type="text" class="form-control has-feedback-left single_cal2" value="{{ old('activity_start', $news->activity_start->format('d.m.Y H:i')) }}">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true">{{$errors->first('activity_start')}}</span>
                                                            </div>
                                                        </div>
                                                        <!--
                                                        <div class="row">
                                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="activity_start">To<span class="required">*</span></label>
                                                            <div class="col-sm-6 xdisplay_inputx form-group has-feedback">
                                                                <input id="activity_end" name="activity_end" type="text" class="form-control has-feedback-left single_cal2">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true">{{$errors->first('activity_end')}}</span>
                                                            </div>
                                                        </div>
                                                        -->
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="name_ru">Name</label>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <input id="name" class="form-control col-md-6 col-xs-6" minlength="3" name="name" required type="text" value="{{old('name', $news->name)}}">
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('name')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="video_url">Video URL</label>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <input id="video_url" class="form-control col-md-6 col-xs-6" minlength="3" name="video_url" type="text" value="{{old('video_url', $news->video_url)}}">
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('video_url')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="tagline-tab">
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="tagline">Tagline</label>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <textarea id="newsCreateTagline" class="form-control col-md-6 col-xs-6" name="tagline" rows="10" cols="20">{{old('tagline', $news->tagline)}}</textarea>
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('tagline')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="details-tab">
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="text_ru">Text</label>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <textarea id="newsCreateText" class="form-control col-md-6 col-xs-6" name="text" rows="10" cols="20">{{old('text', $news->text)}}</textarea>
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('text')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="image-tab">
                                        <div class="item form-group">
                                            <div class="row">
                                                <label class="control-label col-md-1 col-sm-1 col-xs-1" for="photo">Photo</label>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <input id="newsCreatePhoto" class="form-control col-md-6 col-xs-6" name="photo" type="file">
                                                    <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('photo')}}</span>
                                                </div>
                                                @if ($news->photo != '')
                                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                                        <img src="{{ url('storage/images/'.$news->photo)}}" alt="" class="news_thumbnail" width="33" />
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div id="image_input_container">
                                                <div class="row">
                                                    <label class="control-label col-md-1 col-sm-1 col-xs-1" for="image_1">Image 1</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <input id="image_1" class="form-control col-md-6 col-xs-6" name="image_1" type="file">
                                                        <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('image_1')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-1">
                                                    <button id="add_files_button" class="btn btn-info">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-1">
                                    <a href="{{url('admin/content-news/'.$lang)}}" class="btn btn-primary">Cancel</a>
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

@endsection