@extends('layouts.app')

@section('header')
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <a class="main_logo" href="{{ url('/'.$lang) }}"><img src="{{ asset('images/logo.png') }}" alt="logo" class="logo_img"/></a>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="search_container mr-auto">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col no-padding no-margin">
                                    <form id="searchForm" action="javascript:void(0);" method="get">
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
                @if ($section->id == $news_main->first()->section_id)
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/'.$lang.'/section/'.$section->id) }}"><p><span class="border_span">@if ($lang == 'az'){{ $section->name_az }}@else{{ $section->name_ru }}@endif</span></p></a>
                </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/'.$lang.'/section/'.$section->id) }}"><p><span class="border_span">@if ($lang == 'az'){{ $section->name_az }}@else{{ $section->name_ru }}@endif</span></p></a>
                    </li>
                @endif
            @endforeach
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/'.$lang.'/photogallery/') }}"><p>@if ($lang == 'az') Foto @else Фото @endif</p></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/'.$lang.'/video/') }}"><p><span class="no_border_span">@if ($lang == 'az') Video @else Видео @endif</span></p></a>
            </li>
        </ul>
    </div>
@endsection
@section('inner_content')
    <div class="container-fluid news_details_container">
        <div class="row">
            <div class="col-sm-12 col-md-12 life_style_big_news_container">
                <div class="big_news_container__inner">
                    @if ($news_main->count() > 0)
                        <h1 class="h6_settings title_style">{{ $news_main->name }}</h1>
                        @if ($news_main->photo != '')
                            <img src="{{ url('storage/images/'.$news_main->photo )}}" class="news_details_image float-left" alt="news photo"/>
                        @endif
                        <p class="life_style_time title_style">{{ $news_main->activity_start->format('d.m.Y H:i') }} // @if ($lang == 'az') {{ ($news_main->section != null)? $news_main->section->name_az : '' }} @else {{ ($news_main->section != null)? $news_main->section->name_ru : '' }} @endif</p>
                        <div class="big_news_text title_style news_details_text">{!! $news_details_text !!}</div>
                        <div class="news_images">
                            @if ($news_main->image_1 != '' && array_search(1, $replaced_images_arr) === false )
                                <img src="{{ url('storage/images/'.$news_main->image_1) }}" alt="news photo"/>
                                @if ($news_main->image_1_caption != '')
                                    <div class="photo_caption_container">
                                        <p>{{ $news_main->image_1_caption }}</p>
                                    </div>
                                @endif
                            @endif
                            @if ($news_main->image_2 != '' && array_search(2, $replaced_images_arr) === false)
                                    <img src="{{ url('storage/images/'.$news_main->image_2) }}" alt="news photo"/>
                                    @if ($news_main->image_2_caption != '')
                                        <div class="photo_caption_container">
                                            <p>{{ $news_main->image_2_caption }}</p>
                                        </div>
                                    @endif
                                @endif
                                @if ($news_main->image_3 != '' && array_search(3, $replaced_images_arr) === false)
                                    <img src="{{ url('storage/images/'.$news_main->image_3) }}" alt="news photo"/>
                                    @if ($news_main->image_3_caption != '')
                                        <div class="photo_caption_container">
                                            <p>{{ $news_main->image_3_caption }}</p>
                                        </div>
                                    @endif
                                @endif
                                @if ($news_main->image_4 != '' && array_search(4, $replaced_images_arr) === false)
                                    <img src="{{ url('storage/images/'.$news_main->image_4) }}" alt="news photo"/>
                                    @if ($news_main->image_4_caption != '')
                                        <div class="photo_caption_container">
                                            <p>{{ $news_main->image_4_caption }}</p>
                                        </div>
                                    @endif
                                @endif
                                @if ($news_main->image_5 != '' && array_search(5, $replaced_images_arr) === false)
                                    <img src="{{ url('storage/images/'.$news_main->image_5) }}" alt="news photo"/>
                                    @if ($news_main->image_5_caption != '')
                                        <div class="photo_caption_container">
                                            <p>{{ $news_main->image_5_caption }}</p>
                                        </div>
                                    @endif
                                @endif
                                @if ($news_main->image_6 != '' && array_search(6, $replaced_images_arr) === false)
                                    <img src="{{ url('storage/images/'.$news_main->image_6) }}" alt="news photo"/>
                                    @if ($news_main->image_6_caption != '')
                                        <div class="photo_caption_container">
                                            <p>{{ $news_main->image_6_caption }}</p>
                                        </div>
                                    @endif
                                @endif
                                @if ($news_main->image_7 != '' && array_search(7, $replaced_images_arr) === false)
                                    <img src="{{ url('storage/images/'.$news_main->image_7) }}" alt="news photo"/>
                                    @if ($news_main->image_7_caption != '')
                                        <div class="photo_caption_container">
                                            <p>{{ $news_main->image_7_caption }}</p>
                                        </div>
                                    @endif
                                @endif
                                @if ($news_main->image_8 != '' && array_search(8, $replaced_images_arr) === false)
                                    <img src="{{ url('storage/images/'.$news_main->image_8) }}" alt="news photo"/>
                                    @if ($news_main->image_8_caption != '')
                                        <div class="photo_caption_container">
                                            <p>{{ $news_main->image_8_caption }}</p>
                                        </div>
                                    @endif
                                @endif
                                @if ($news_main->image_9 != '' && array_search(9, $replaced_images_arr) === false)
                                    <img src="{{ url('storage/images/'.$news_main->image_9) }}" alt="news photo"/>
                                    @if ($news_main->image_9_caption != '')
                                        <div class="photo_caption_container">
                                            <p>{{ $news_main->image_9_caption }}</p>
                                        </div>
                                    @endif
                                @endif
                                @if ($news_main->image_10 != '' && array_search(10, $replaced_images_arr) === false)
                                    <img src="{{ url('storage/images/'.$news_main->image_10) }}" alt="news photo"/>
                                    @if ($news_main->image_10_caption != '')
                                        <div class="photo_caption_container">
                                            <p>{{ $news_main->image_10_caption }}</p>
                                        </div>
                                    @endif
                                @endif
                        </div>
                        <div class="clearfix"></div>
                        @if ($video_url != '')
                            <div class="yt_wrapper">
                                <div class="h_iframe">
                                    {!! $video_url !!}
                                </div>
                            </div>
                        @endif

                        <div class="view_count">
                            @auth
                            {{ ($lang == 'az')? 'Baxilib:' : 'Просмотрено:' }} {{ $news_main->view_count }}
                            @endauth
                        </div>

                        <div class="fb-like" data-href="{{ Request::url() }}" data-layout="standard" data-action="recommend" data-width="345" data-size="small" data-show-faces="true" data-share="true"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid similar_news_container no-gutters">
        <div class="row">
            <div class="col-sm-12 similar_news_container__title">
                <p class="line_width"><span class="news_category_span news_similar_title">@if ($lang == 'ru') Новости раздела @else Digər xəbərlər @endif </span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 popular_news_container">
                <div class="row">
                    @foreach ($similar_news as $similar_news_item)
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 photogallery_container__inner">
                            <div class="photogallery_container__img photogallery_container_text">
                                @if ($similar_news_item->photo != '')
                                    <a href="{{url($lang.'/news_details/'.$similar_news_item->id)}}">
                                        <img src="{{ url('storage/images/'.$similar_news_item->photo) }}" alt="album cover photo" class="photogallery_cover__img"/>
                                    </a>
                                @endif
                                <a href="{{ url($lang.'/news_details/'.$similar_news_item->id) }}">
                                    <h5 class="photogallery_text">{{ $similar_news_item->name }}</h5>
                                </a>
                            </div>
                        </div>
                    @endforeach
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
                        <p class="popular_news_time">{{$news_item->activity_start->format('d.m.Y H:i')}} // @if ($lang == 'az') Foto @else Фото @endif</p>
                        <div class="line_p_margin_3"><p class="line_p_2"></p></div>
                    </div>
                @else
                    <div class="life_style_comments_container">
                        <a href="{{url($lang.'/news_details/'.$news_item->id)}}" class="life_style_comments_container_text">
                            <p class="life_style_comments_container_text title_style @if ($news_item->important) title_style_important @endif @if ($news_item->very_important) title_style_very_important @endif">{{$news_item->name}}</p>
                        </a>
                        <p class="popular_news_time">{{$news_item->activity_start->format('d.m.Y H:i')}} // @if($lang == 'az') {{ ($news_item->section != null)? $news_item->section->name_az : '' }} @else {{ ($news_item->section != null)? $news_item->section->name_ru : '' }} @endif</p>
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