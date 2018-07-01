@extends('admin.layouts.layout')

@section('title', 'Structure Sections')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        Structure Sections
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
                            <h2>Create User</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form class="form-horizontal form-label-left" action="{{url('admin/structure-sections/')}}" method="post">
                                {{ csrf_field() }}
                                <div class="item form-group {{$errors->has('name_ru')?'has-error':''}}">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name_ru">Name RU<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name_ru" class="form-control col-md-7 col-xs-12" minlength="3" name="name_ru" required type="text" value="{{old('name_ru')}}">
                                        <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('name_ru')}}</span>
                                    </div>
                                </div>
                                <div class="item form-group {{$errors->has('name_az')?'has-error':''}}">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name_az">Name AZ<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name_az" class="form-control col-md-7 col-xs-12" minlength="3" name="name_az" required type="text" value="{{old('name_az')}}">
                                        <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('name_az')}}</span>
                                    </div>
                                </div>
                                <div class="item form-group {{$errors->has('lastname')?'has-error':''}}">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="published">Published</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="published" class="js-switch form-control col-md-7 col-xs-12" minlength="3" name="published" type="checkbox" value="{{(old('published') == 'on') ? 'checked':''}}">
                                        <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('published')}}</span>
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