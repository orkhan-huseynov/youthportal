@extends('layouts.app')

@section('header')
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <a href="{{ url('/'.$lang) }}"><img src="{{ asset('images/logo.png') }}" alt="logo" class="logo_img"/></a>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="search_container mr-auto">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col no-padding no-margin">
                                    <form id="searchForm" action="{{ url('/search/'.$lang) }}" method="get">
                                        <div class="input-group mb-3 search_btn">
                                            <input id="searchInput" name="ss" type="search" class="form-control" placeholder="@if ($lang == 'az') axtar @else поиск @endif" aria-label="search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button id="searchFormButton" class="btn btn-outline-secondary" type="button" data-lang="{{ $lang }}"><i class="fa fa-search search_btn_icon" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col no-padding no-margin">
                                    <div class="lang_changer">
                                        @if ($lang == 'az')
                                            <a href="{{url('/ru')}}" class="btn btn-danger lang_class">Ru</a>
                                        @else
                                            <a href="{{url('/az')}}" class="btn btn-danger lang_class">Az</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('main_menu')
    <div class="collapse navbar-collapse menu_inner" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/'.$lang)}}"><p><span class="border_span">@if ($lang == 'az') Əsas @else Главная @endif <span class="sr-only">(current)</span></span></p></a>
            </li>
            @foreach($sections as $section)
                @if ($section->id == $section_id)
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/'.$lang.'/section/'.$section->id)}}"><p><span class="border_span">@if ($lang == 'az'){{ $section->name_az }}@else{{ $section->name_ru }}@endif</span></p></a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/'.$lang.'/section/'.$section->id)}}"><p><span class="border_span">@if ($lang == 'az'){{ $section->name_az }}@else{{ $section->name_ru }}@endif</span></p></a>
                    </li>
                @endif
            @endforeach
            <li class="nav-item">
                <a class="nav-link" href="{{url('/'.$lang.'/photogallery/')}}"><p><span class="no_border_span">@if ($lang == 'az') Foto @else Фото @endif</span></p></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/'.$lang.'/video/')}}"><p><span class="no_border_span">@if ($lang == 'az') Video @else Видео @endif</span></p></a>
            </li>
        </ul>
    </div>
@endsection
@section('inner_content')
    <div class="container-fluid section_news_container">
        <div class="row section_news_inner">
            <div class="col-sm-12 col-md-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 news_category_container hover_class">
                        <a href="#"><p><span class="news_category_span">@if($lang == 'az') {{$section_name->first()->name_az}} @else {{$section_name->first()->name_ru}} @endif </span></p></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 popular_news_container">
                        @foreach($section_news as $news_s)
                            <div class="row">
                                <div class="col-md-12 col-lg-3 popular_inner">
                                    <div class="popular_news_container__img">
                                        <a href="{{url($lang.'/news_details/'.$news_s->id)}}">
                                            <img src="{{url('storage/images/'.$news_s->photo_150)}}" alt="news photo" class="popular_news_img"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-9 popular_inner">
                                    <div class="popular_news_container_second__text popular_news_container_second">
                                        <p class="popular_news_time">{{$news_s->activity_start->format('d.m.Y H:i')}}</p>
                                        <a href="{{url($lang.'/news_details/'.$news_s->id)}}">
                                            <h6 class="title_style">{{$news_s->name}}</h6>
                                        </a>
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
                <div class="row">
                    <div class="col">
                        {{ $section_news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('news_ribbon')
    <div class="row">
        <div class="col-sm-12 col-md-12 news_category_container hover_class">
            <p class="line_width ribbon_text"><span class="news_category_span">@if ($lang == 'ru') Новостная лента @else Xəbər lenti @endif </span></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 comments_container_margin">
            @foreach ($news as $news_item)
                <div class="life_style_comments_container">
                    <a href="{{url($lang.'/news_details/'.$news_item->id)}}" class="life_style_comments_container_text">
                        <p class="life_style_comments_container_text title_style @if ($news_item->important) title_style_important @endif @if ($news_item->very_important) title_style_very_important @endif">{{$news_item->name}}</p>
                    </a>
                    <p class="popular_news_time">{{$news_item->activity_start->format('d.m.Y H:i')}} // @if($lang == 'az') {{ ($news_item->section != null)? $news_item->section->name_az : '' }} @else {{ ($news_item->section != null)? $news_item->section->name_ru : '' }} @endif</p>
                    <div class="line_p_margin_3"><p class="line_p_2"></p></div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('video_container')
    <div class="row margin_class">
        <div class="col-sm-12 col-md-12 video_container_2 hover_class">
            <div>
                <p class="video_text"><a><span class="video_text_span">@if ($lang == 'az') Günün videosu @else Видео дня @endif</span></a></p>
            </div>
            <div class="video_container__inner_2">
                {!! $video_of_day !!}
            </div>
            <!--
            <div>
                <a><p class="sport_text"><span class="sport_text_span">ADS SPOT</span></p></a>
            </div>
            -->
        </div>
    </div>
@endsection

@section('facebook_social')
    @if($lang == 'ru')
        <div class="fb-page" data-href="https://www.facebook.com/YouthPortalaz-198120266876647/" data-tabs="timeline" data-width="334" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/YouthPortalaz-198120266876647/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/YouthPortalaz-198120266876647/">YouthPortal.az</a></blockquote></div>
    @else
        <div class="fb-page" data-href="https://www.facebook.com/youthportalaz/" data-tabs="timeline" data-width="343" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/youthportalaz/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/youthportalaz/">Youth Portal</a></blockquote></div>
    @endif
@endsection