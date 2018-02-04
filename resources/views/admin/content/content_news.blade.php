@extends('admin.layouts.layout')

@section('title', 'NewsRu')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    News ({{$lang}})
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
                        <h2><a href="{{url('admin/content-news/create/'.$lang)}}"><i class="fa fa-plus"></i> Create</a></h2>
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
                                <th>Section</th>
                                <th>Name</th>
                                <th>Published</th>
                                <th>From</th>
                                <th>Video of Day</th>
                                <th>Actuality</th>
                                <th>Importance</th>
                                <th class=" no-link last"><span class="nobr">Actions</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($news as $news_item)
                                <tr>
                                    <td class="">{{$news_item->id}}</td>
                                    <td class="">{{$news_item->section->name_ru}}</td>
                                    <td class="">{{$news_item->name}}</td>
                                    <td class="">@if ($news_item->active) <i class="fa fa-check"></i> @endif</td>
                                    <td class="">{{$news_item->activity_start->format('d.m.Y H:i')}}</td>
                                    <td class="">@if ($news_item->video_of_day) <i class="fa fa-check"></i> @endif</td>
                                    <td class="">@if ($news_item->very_actual) Very actual @elseif ($news_item->actual) Actual @endif</td>
                                    <td class="">@if ($news_item->very_important) Very important @elseif ($news_item->important) Important @endif</td>
                                    <td class="last"><a href="{{url('admin/content-news/'.$lang.'/'.$news_item->id.'/edit')}}"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a class="delete-link" href="javascript:void(0);" data-url="{{url('admin/content-news/'.$lang.'/'.$news_item->id)}}" data-return-url="{{url('admin/content-news/'.$lang)}}"><i class="fa fa-trash"></i></a></td>
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