@extends('layouts.app')

@section('main_menu')
    <div class="collapse navbar-collapse menu_inner" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#"><p>Главная <span class="sr-only">(current)</span></p></a>
            </li>
            @foreach($sections as $section)
                <li class="nav-item">
                    <a class="nav-link" href="#"><p>{{ $section->name_ru }}</p></a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
@section('inner_content')
            <div class="container-fluid section_news_container">
                <div class="row section_news_inner">
                    <div class="col-sm-12 col-md-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 news_category_container hover_class">
                                <a href="#"><p><span class="news_category_span">{{$section_name->first()->name_ru}}</span></p></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 popular_news_container">
                                @foreach($section_news as $news_s)
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 popular_inner">
                                            <div class="popular_news_container__img">
                                                <img src="storage/images/{{$news_s->photo_150}}" alt="news photo" class="popular_news_img"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 popular_inner">
                                            <div class="popular_news_container_second__text popular_news_container_second">
                                                <p class="popular_news_time">{{$news_s->activity_start}}</p>
                                                <h6>{{$news_s->name}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row for_line">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="line_p_margin_2"><p class="line_p_2"></p></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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