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
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/'.$lang.'/section/'.$section->id)}}"><p><span class="border_span">@if ($lang == 'az'){{ $section->name_az }}@else{{ $section->name_ru }}@endif</span></p></a>
                    </li>
            @endforeach
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/'.$lang.'/photogallery/')}}"><p><span class="border_span">@if ($lang == 'az') Foto @else Фото @endif</span></p></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/'.$lang.'/video/')}}"><p><span class="no_border_span">@if ($lang == 'az') Video @else Видео @endif</span></p></a>
            </li>
        </ul>
    </div>
@endsection
@section('inner_content')
    <div class="container-fluid news_details_container">
        <div class="row">
            <div class="col-sm-12 col-md-12 life_style_big_news_container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 news_category_container hover_class">
                            <a href="#"><p class="photogallery_name"><span class="news_category_span">@if($lang == 'az') Fotoqalereya @else Фотогалерея @endif </span></p></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 popular_news_container">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach($photogallery->photos as $photo)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{url('storage/images/'.$photogallery->cover_photo)}}" alt="album photo" class="crls_image">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{($lang == 'az') ? $photogallery->name_az : $photogallery->name_ru}}</h5>
                                        </div>
                                    </div>
                                    @foreach($photogallery->photos as $photo)
                                    <div class="carousel-item">
                                        <img src="{{url('storage/images/'.$photo->image)}}" alt="album photo" class="crls_image">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{($lang == 'az') ? $photogallery->name_az : $photogallery->name_ru}}</h5>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <ul class="carousel-indicators list-inline">
                                    <li class="list-inline-item active">
                                        <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#carouselExampleIndicators">
                                            <img src="{{ url('storage/images/'.$photogallery->cover_photo )}}" class="img-fluid">
                                        </a>
                                    </li>
                                    @php $n = 1; @endphp
                                    @foreach($photogallery->photos as $photo)
                                        <li class="list-inline-item">
                                            <a id="carousel-selector-1" data-slide-to="{{ $n }}" data-target="#carouselExampleIndicators">
                                                <img src="{{ url('storage/images/'.$photo->image) }}" class="img-fluid">
                                            </a>
                                        </li>
                                        @php $n++; @endphp
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 photogallery_second_container">
                            <div class="row">
                                <div class="col-sm-12 similar_news_container__title">
                                    <p class="line_width"><span class="news_category_span section_similar_title">@if ($lang == 'ru') Еще из раздела @else Bölmədən digər @endif </span></p>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($photogalleries as $photogallery_item)
                                    @if($photogallery->id == $photogallery_item->id)
                                        @continue;
                                    @endif
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 photogallery_container__inner">
                                        <div class="photogallery_container__img photogallery_container_text">
                                            <a href="{{url($lang.'/photogallery_details/'.$photogallery_item->id)}}">
                                                <img src="{{url('storage/images/'.$photogallery_item->cover_photo_200)}}" alt="album cover photo" class="photogallery_cover__img"/>
                                            </a>
                                            <a href="{{url($lang.'/photogallery_details/'.$photogallery_item->id)}}">
                                                <h5 class="photogallery_text">@if($lang == 'az'){{$photogallery_item->name_az}} @else {{$photogallery_item->name_ru}} @endif </h5>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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
                @if ($news_item->getTable() == 'photogalleries')
                    <div class="life_style_comments_container">
                        <a href="{{url($lang.'/photogallery_details/'.$news_item->id)}}" class="life_style_comments_container_text">
                            <p class="life_style_comments_container_text title_style">@if ($lang == 'az') {{ $news_item->name_az }} @else {{ $news_item->name_ru }} @endif</p>
                        </a>
                        <p class="popular_news_time">{{$news_item->activity_start->format('d.m.Y h:i')}} // @if ($lang == 'az') Foto @else Фото @endif</p>
                        <div class="line_p_margin_3"><p class="line_p_2"></p></div>
                    </div>
                @else
                    <div class="life_style_comments_container">
                        <a href="{{url($lang.'/news_details/'.$news_item->id)}}" class="life_style_comments_container_text">
                            <p class="life_style_comments_container_text title_style @if ($news_item->important) title_style_important @endif @if ($news_item->very_important) title_style_very_important @endif">{{$news_item->name}}</p>
                        </a>
                        <p class="popular_news_time">{{$news_item->activity_start->format('d.m.Y h:i')}} // @if($lang == 'az') {{$news_item->section->name_az}} @else {{$news_item->section->name_ru}} @endif</p>
                        <div class="line_p_margin_3"><p class="line_p_2"></p></div>
                    </div>
                @endif
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