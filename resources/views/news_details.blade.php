@extends('layouts.app')

@section('main_menu')
    <div class="collapse navbar-collapse menu_inner" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#"><p>Главная <span class="sr-only">(current)</span></p></a>
            </li>
            @foreach($sections as $section)
                <li class="nav-item">
                    <a class="nav-link" href="section/{{$section->id}}"><p>{{ $section->name_ru }}</p></a>
                </li>
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
                        <img src="storage/images/{{$news_main->first()->photo}}" alt="news photo"/>
                        <h6 class="h6_settings">{{$news_main->first()->name}}</h6>
                        <p class="life_style_time">{{$news_main->first()->activity_start}} // {{$news_main->first()->section->name_ru}} // Нет комментариев</p>
                        <p class="big_news_text">{{$news_main->first()->text}}</p>
                        <div class="">
                            {{--@if ($news_main->count()->image_1)--}}
                            <img src="storage/images/{{$news_main->first()->image_1}}" alt="news photo"/>
                            <img src="storage/images/{{$news_main->first()->image_2}}" alt="news photo"/>
                            <img src="storage/images/{{$news_main->first()->image_3}}" alt="news photo"/>
                            <img src="storage/images/{{$news_main->first()->image_4}}" alt="news photo"/>
                            <img src="storage/images/{{$news_main->first()->image_5}}" alt="news photo"/>
                            <img src="storage/images/{{$news_main->first()->image_6}}" alt="news photo"/>
                            <img src="storage/images/{{$news_main->first()->image_7}}" alt="news photo"/>
                            <img src="storage/images/{{$news_main->first()->image_8}}" alt="news photo"/>
                            <img src="storage/images/{{$news_main->first()->image_9}}" alt="news photo"/>
                            <img src="storage/images/{{$news_main->first()->image_10}}" alt="news photo"/>
                            {{--@endif--}}
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
                    <p class="popular_news_time">{{$news_item->activity_start->format('d.m.Y h:i')}} // World News // No Comments</p>
                    <div class="line_p_margin_3"><p class="line_p_2"></p></div>
                </div>
            @endforeach
        </div>
    </div>
@endsection