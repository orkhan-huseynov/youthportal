@extends('admin.layouts.layout')

@section('title', 'System Users')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    System Users
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
                        <form class="form-horizontal form-label-left" action="{{url('admin/system-users/')}}" method="post">
                            {{ csrf_field() }}
                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="group">Group <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="group" class="form-control col-md-7 col-xs-12" minlength="6" name="group" required>
                                        @foreach ($groups as $group)
                                            <option value="{{$group->id}}" {{(old('group') == $group->id) ? 'selected':''}}>{{$group->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group {{$errors->has('name')?'has-error':''}}">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Full Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" minlength="3" name="name" required type="text" value="{{old('name')}}">
                                    <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('name')}}</span>
                                </div>
                            </div>
                            <div class="item form-group {{$errors->has('email')?'has-error':''}}">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Email <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="{{old('email')}}">
                                    <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('email')}}</span>
                                </div>
                            </div>
                            <div class="item form-group {{$errors->has('gender')?'has-error':''}}">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="gender">Gender</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn @if (old('gender') == 'male') btn-primary @else btn-default @endif genderButtonLabel" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="male" @if (old('gender') == 'male') checked @endif> &nbsp; Male &nbsp;
                                        </label>
                                        <label class="btn @if (old('gender') == 'female') btn-primary @else btn-default @endif genderButtonLabel" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" @if (old('gender') == 'female') checked @endif>
                                            <input type="radio" name="gender" value="female" @if (old('gender') == 'female') checked @endif> Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group {{$errors->has('password')?'has-error':''}}">
                                <label for="password" class="control-label col-md-2 col-sm-2 col-xs-12">Password <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="password" type="password" name="password" minlength="6" class="form-control col-md-7 col-xs-12" required>
                                    <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('password')}}</span>
                                </div>
                            </div>
                            <div class="item form-group {{$errors->has('password2')?'has-error':''}}">
                                <label for="password2" class="control-label col-md-2 col-sm-2 col-xs-12">Repeat Password <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="password2" type="password" name="password2" minlength="6" class="form-control col-md-7 col-xs-12" required>
                                    <span class="col-md-5 col-xs-2 text-danger">{{$errors->first('password2')}}</span>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-1">
                                    <a href="{{url('admin/system-users')}}" class="btn btn-primary">Cancel</a>
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