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
                        <h2><a href="{{url('admin/content-photogallery/create/')}}"><i class="fa fa-plus"></i> Create</a></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-fixed-header" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name RU</th>
                                <th>Name AZ</th>
                                <th>Published</th>
                                <th>From</th>
                                <th class=" no-link last"><span class="nobr">Actions</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($photogalleries as $photogallery)
                                <tr>
                                    <td class="">{{$photogallery->id}}</td>
                                    <td class="">{{$photogallery->name_ru}}</td>
                                    <td class="">{{$photogallery->name_az}}</td>
                                    <td class="">@if ($photogallery->active) <i class="fa fa-check"></i> @endif</td>
                                    <td class="">{{$photogallery->activity_start->format('d.m.Y H:i')}}</td>
                                    <td class="last"><a href="{{url('admin/content-photogallery/'.$photogallery->id.'/edit')}}"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a class="delete-link" href="javascript:void(0);" data-url="{{url('admin/content-photogallery/'.$photogallery->id)}}" data-return-url="{{url('admin/content-photogallery/')}}"><i class="fa fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

@endsection