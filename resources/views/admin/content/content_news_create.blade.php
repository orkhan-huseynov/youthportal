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
                        <h2>Create news</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" action="{{url('admin/content-news/'.$lang)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

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
                                                <select id="section" class="js-switch form-control col-md-7 col-xs-12" minlength="3" name="section">
                                                    <option value="0">Choose Section</option>
                                                    @foreach ($sections as $section)
                                                        <option value="{{$section->id}}">{{$section->name_ru}}</option>
                                                    @endforeach

                                                </select>
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('section')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="published">Published</label>
                                            <div class="col-md-11 col-sm-11 col-xs-11 to_left">
                                                <input id="published" class="js-switch form-control col-md-7 col-xs-12" minlength="3" name="published" type="checkbox" @if (old('published') == 'on')  'checked' @endif">
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('published')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="published">Actual</label>
                                            <div class="col-md-11 col-sm-11 col-xs-11 to_left">
                                                <input id="actual" class="js-switch form-control col-md-7 col-xs-12" minlength="3" name="actual" type="checkbox" @if (old('actual') == 'on')  'checked' @endif">
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('actual')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="published">Very actual</label>
                                            <div class="col-md-11 col-sm-11 col-xs-11 to_left">
                                                <input id="very_actual" class="js-switch form-control col-md-7 col-xs-12" minlength="3" name="very_actual" type="checkbox" @if (old('very_actual') == 'on')  'checked' @endif">
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('very_actual')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="published">Important</label>
                                            <div class="col-md-11 col-sm-11 col-xs-11 to_left">
                                                <input id="important" class="js-switch form-control col-md-7 col-xs-12" minlength="3" name="actual" type="checkbox" @if (old('important') == 'on')  'checked' @endif">
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('important')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="published">Very important</label>
                                            <div class="col-md-11 col-sm-11 col-xs-11 to_left">
                                                <input id="very_important" class="js-switch form-control col-md-7 col-xs-12" minlength="3" name="very_important" type="checkbox" @if (old('very_important') == 'on')  'checked' @endif">
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('very_important')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                                <div class="control-group">
                                                    <div class="controls container-fluid">
                                                        <div class="row">
                                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="activity_start">From<span class="required">*</span></label>
                                                            <div class="col-sm-6 xdisplay_inputx form-group has-feedback">
                                                                <input id="activity_start" name="activity_start" type="text" class="form-control has-feedback-left single_cal2">
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
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="name_ru">Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <input id="name" class="form-control col-md-6 col-xs-6" minlength="3" name="name" required type="text" value="{{old('name')}}">
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('name')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="tagline-tab">
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="tagline">Tagline<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <textarea id="tagline" class="form-control col-md-6 col-xs-6" name="tagline" required rows="10" cols="20">{{old('tagline')}}</textarea>
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('tagline')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="details-tab">
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="text_ru">Text<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <textarea id="tagline" class="form-control col-md-6 col-xs-6" name="text" required rows="10" cols="20">{{old('text')}}</textarea>
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('text')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="image-tab">
                                        <div class="item form-group">
                                            <div class="row">
                                                <label class="control-label col-md-1 col-sm-1 col-xs-1" for="photo">Photo<span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <input id="photo" class="form-control col-md-6 col-xs-6" name="photo" required type="file">
                                                    <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('photo')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div id="image_input_container">
                                                <div class="row">
                                                    <label class="control-label col-md-1 col-sm-1 col-xs-1" for="image_1">Image 1<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <input id="image_1" class="form-control col-md-6 col-xs-6" name="image_1" required type="file">
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
                                    <a href="{{url('admin/structure-sections')}}" class="btn btn-primary">Cancel</a>
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