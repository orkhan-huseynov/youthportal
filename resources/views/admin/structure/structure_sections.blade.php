@extends('admin.layouts.layout')

@section('title', 'Sections')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Sections
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
                        <h2><a href="{{url('admin/structure-sections/create')}}"><i class="fa fa-plus"></i> Create</a></h2>
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
                                <th>Name (AZ)</th>
                                <th>Name (RU)</th>
                                <th>Published</th>
                                <th>Position</th>
                                <th class=" no-link last"><span class="nobr">Actions</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($sections as $section)
                                <tr>
                                    <td class="">{{$section->id}}</td>
                                    <td class="">{{$section->name_az}}</td>
                                    <td class="">{{$section->name_ru}}</td>
                                    <td class="">@if ($section->published) <i class="fa fa-check"></i> @endif</td>
                                    <td class="">{{$section->position}}</td>
                                    <td class="last"><a href="{{url('admin/structure-sections/'.$section->id.'/edit')}}"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a class="delete-link" href="javascript:void(0);" data-url="{{url('admin/structure-sections/'.$section->id)}}" data-return-url="{{url('admin/structure-sections')}}"><i class="fa fa-trash"></i></a></td>
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