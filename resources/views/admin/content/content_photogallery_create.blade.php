@extends('admin.layouts.layout')

@section('title', 'News')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Photogallery
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
                        <h2>Create photogallery</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="PhotogalleryCreateForm" class="form-horizontal form-label-left" action="{{url('admin/content-photogallery')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="newsTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="element-tab" role="tab" data-toggle="tab" aria-expanded="true">Element</a></li>
                                    <li role="presentation" class=""><a href="#tab_content4" role="tab" id="image-tab" data-toggle="tab" aria-expanded="false">Images</a></li>
                                </ul>
                                <div id="newsTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="element-tab">
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="name_ru">Name RU</label>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <input id="name_ru" class="form-control col-md-6 col-xs-6" minlength="3" name="name_ru" required type="text" value="{{old('name_ru')}}">
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('name_ru')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="name_ru">Name AZ</label>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <input id="name_az" class="form-control col-md-6 col-xs-6" minlength="3" name="name_az" required type="text" value="{{old('name_az')}}">
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('name_az')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-1 col-sm-1 col-xs-1" for="published">Published</label>
                                            <div class="col-md-5 col-sm-5 col-xs-5 to_left">
                                                <input id="published" class="js-switch form-control col-md-7 col-xs-12" minlength="3" name="published" type="checkbox" @if (old('published') == 'on')  checked @endif>
                                                <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('published')}}</span>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="control-group">
                                                <div class="controls container-fluid">
                                                    <div class="row">
                                                        <label class="control-label col-md-1 col-sm-1 col-xs-1" for="activity_start">From</label>
                                                        <div class="col-sm-6 xdisplay_inputx form-group has-feedback">
                                                            <input id="newsCreateActivityStart" name="activity_start" type="text" class="form-control has-feedback-left single_cal2">
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true">{{$errors->first('activity_start')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="row">
                                                <label class="control-label col-md-1 col-sm-1 col-xs-1" for="cover_photo">Cover Photo</label>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <input id="newsCreatePhoto" class="form-control col-md-6 col-xs-6" name="cover_photo" type="file">
                                                    <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('cover_photo')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="image-tab">
                                        <div class="item form-group">
                                            <div id="image_input_container_second">
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
                                                    <button id="add_images_button" class="btn btn-info">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-1">
                                    <a href="{{url('admin/content-photogallery')}}" class="btn btn-primary">Cancel</a>
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