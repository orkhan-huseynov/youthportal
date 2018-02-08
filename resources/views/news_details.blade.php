@extends('layouts.app')

@section('main_menu')
    <div class="collapse navbar-collapse menu_inner" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}"><p>Главная <span class="sr-only">(current)</span></p></a>
            </li>
            @foreach($sections as $section)
                @if ($section->id == $news_main->first()->section_id)
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('section/'.$section->id)}}"><p>{{ $section->name_ru }}</p></a>
                </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('section/'.$section->id)}}"><p>{{ $section->name_ru }}</p></a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection
@section('inner_content')
    <div class="container-fluid news_details_container">
        <div class="row">
            <div class="col-sm-12 col-md-12 life_style_big_news_container">
                <div class="big_news_container__inner">
                    @if ($news_main->count() > 0)
                        <img src="{{url('storage/images/'.$news_main->first()->photo)}}" alt="news photo"/>
                        <h6 class="h6_settings">{{$news_main->first()->name}}</h6>
                        <p class="life_style_time">{{$news_main->first()->activity_start}} // {{$news_main->first()->section->name_ru}} // Нет комментариев</p>
                        <p class="big_news_text">{{$news_main->first()->text}}</p>
                        <div class="">
                            @if ($news_main->first()->image_1 != '')
                                <img src="{{url('storage/images/'.$news_main->first()->image_1)}}" alt="news photo"/>
                            @endif
                                @if ($news_main->first()->image_2 != '')
                                    <img src="{{url('storage/images/'.$news_main->first()->image_2)}}" alt="news photo"/>
                                @endif
                                @if ($news_main->first()->image_3 != '')
                                    <img src="{{url('storage/images/'.$news_main->first()->image_3)}}" alt="news photo"/>
                                @endif
                                @if ($news_main->first()->image_4 != '')
                                    <img src="{{url('storage/images/'.$news_main->first()->image_4)}}" alt="news photo"/>
                                @endif
                                @if ($news_main->first()->image_5 != '')
                                    <img src="{{url('storage/images/'.$news_main->first()->image_5)}}" alt="news photo"/>
                                @endif
                                @if ($news_main->first()->image_6 != '')
                                    <img src="{{url('storage/images/'.$news_main->first()->image_6)}}" alt="news photo"/>
                                @endif
                                @if ($news_main->first()->image_7 != '')
                                    <img src="{{url('storage/images/'.$news_main->first()->image_7)}}" alt="news photo"/>
                                @endif
                                @if ($news_main->first()->image_8 != '')
                                    <img src="{{url('storage/images/'.$news_main->first()->image_8)}}" alt="news photo"/>
                                @endif
                                @if ($news_main->first()->image_9 != '')
                                    <img src="{{url('storage/images/'.$news_main->first()->image_9)}}" alt="news photo"/>
                                @endif
                                @if ($news_main->first()->image_10 != '')
                                    <img src="{{url('storage/images/'.$news_main->first()->image_10)}}" alt="news photo"/>
                                @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
@section('news_ribbon')
    <div class="row">
        <div class="col-sm-12 col-md-12 news_category_container hover_class">
            <a href="#"><p class="line_width"><span class="news_category_span">НОВОСТНАЯ ЛЕНТА</span></p></a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 comments_container_margin">
            @foreach ($news as $news_item)
                <div class="life_style_comments_container">
                    <p class="life_style_comments_container_text">{{$news_item->name}}</p>
                    <p class="popular_news_time">{{$news_item->activity_start->format('d.m.Y h:i')}} // {{$news_item->section->name_ru}} // No Comments</p>
                    <div class="line_p_margin_3"><p class="line_p_2"></p></div>
                </div>
            @endforeach
        </div>
    </div>
@endsection