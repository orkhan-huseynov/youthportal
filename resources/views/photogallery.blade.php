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
                                <div class="row">
                                    @foreach ($photogalleries as $photogallery)
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 photogallery_container__inner">
                                        <div class="photogallery_container__img photogallery_container_text">
                                            <a href="{{url($lang.'/photogallery_details/'.$photogallery->id)}}">
                                                <img src="{{url('storage/images/'.$photogallery->cover_photo_200)}}" alt="album cover photo" class="photogallery_cover__img"/>
                                            </a>
                                            <a href="{{url($lang.'/photogallery_details/'.$photogallery->id)}}">
                                                <h5 class="photogallery_text">@if($lang == 'az'){{$photogallery->name_az}} @else {{$photogallery->name_ru}} @endif </h5>
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
                <iframe src="https://www.youtube.com/embed/IhqqZN0H7CI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
            <!--
            <div>
                <a><p class="sport_text"><span class="sport_text_span">ADS SPOT</span></p></a>
            </div>
            -->
        </div>
    </div>
@endsection
@section('networks_container')
    <div class="row margin_class">
        <div class="col-sm-12 col-md-12 news_category_container hover_class">
            <p class="video_text"><span class="news_category_span">@if ($lang == 'az') Bizə qoşulun @else Присоединяйтесь к нам @endif</span></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-md-4 networks_cards_container">
            <div class="networks_card networks_card_first">
                <img class="card_img" src="{{ asset('images/f.png') }}" alt="facebook">
                <div class="card_body">
                    <p class="card_text"><span class="networks_numbers">7.000</span><span class="networks_second_span">@if($lang == 'az') izləyici @else подписчиков @endif</span></p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 networks_cards_container">
            <div class="networks_card networks_card_second">
                <img class="card_img" src="{{ asset('images/o-TWITTER-570.jpg') }}" alt="facebook">
                <div class="card_body">
                    <p class="card_text"><span class="networks_numbers">3.000</span><span class="networks_second_span">followers</span></p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 networks_cards_container">
            <div class="networks_card networks_card_third">
                <img class="card_img" src="{{ asset('images/how-to-create-rss-feed-joomla-3x.jpg') }}" alt="facebook">
                <div class="card_body">
                    <p class="card_text"><span>@if($lang == 'az') Rss vasitəsi ilə izləyin @else Следите через Rss @endif</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer')
    <footer>
        <div class="container-fluid">
            <div class="row footer_inner">
                {{--<div class="col-sm-12 col-md-3 hover_class footer_category">
                    <a href="#" class="footer_a"><p class="footer_p"><span class="news_category_span">TWEETS</span></p></a>
                </div>--}}
                <div class="col-sm-12 col-md-6 hover_class footer_category">
                    <p class="footer_p footer_a"><span class="news_category_span">@if($lang == 'az') Naviqasiya @else Навигация @endif</span></p>
                    <ul class="footer_ul">
                        @foreach($sections as $section)
                            <li><a href="{{url($lang.'/section/'.$section->id)}}"><i class="fa fa-chevron-right" aria-hidden="true"></i><span>  @if($lang == 'ru') {{' '.$section->name_ru}} @else {{' '.$section->name_az}} @endif</span></a></li>
                        @endforeach
                    </ul>
                </div>
                {{--<div class="col-sm-12 col-md-3 hover_class footer_category">
                    <a href="#" class="footer_a"><p class="footer_p"><span class="news_category_span">SOMETHING</span></p></a>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 footer_img_container">
                            <img src="{{ asset('stock-photo-financial-business-news.jpg') }}" class="footer_img" alt="footer photo"/>
                            <img src="{{ asset('images/tn_ir-iran-russia-mou-20171218.jpg') }}" class="footer_img" alt="footer photo"/>
                            <img src="{{ asset('images/7deb467507756b82a9cfeb84d6a27aab.jpg') }}" class="footer_img" alt="footer photo"/>
                        </div>
                        <div class="col-sm-6 col-md-4 footer_img_container">
                            <img src="{{ asset('images/SILO_fb_022117_stockNews_shutter.jpg') }}" class="footer_img" alt="footer photo"/>
                            <img src="{{ asset('images/man-coffee-cup-pen.jpg') }}" class="footer_img" alt="footer photo"/>
                            <img src="{{ asset('images/mother-holding-baby-landing.jpg') }}" class="footer_img" alt="footer photo"/>
                        </div>
                        <div class="col-sm-6 col-md-4 footer_img_container">
                            <img src="{{ asset('images/micex-russia-stocks-ruble.jpg') }}" class="footer_img" alt="footer photo"/>
                            <img src="{{ asset('images/blue-apron-shares-make-bland-debut-2017-6.jpg') }}" class="footer_img" alt="footer photo"/>
                            <img src="{{ asset('images/stock-photo-financial-business-news-online-on-a-laptop-with-coffee-and-stationery-252720643.jpg') }}" class="footer_img" alt="footer photo"/>
                        </div>
                    </div>
                </div>--}}
                <div class="col-sm-12 col-md-6 hover_class footer_category">
                    <p class="footer_p footer_a"><span class="news_category_span">@if($lang == 'az') Haqqımızda @else О нас @endif</span></p>
                    <p class="footer_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </footer>
@endsection
@section('facebook_social')
    @if($lang == 'ru')
        <div class="fb-page" data-href="https://www.facebook.com/YouthPortalaz-198120266876647/" data-tabs="timeline" data-width="334" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/YouthPortalaz-198120266876647/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/YouthPortalaz-198120266876647/">YouthPortal.az</a></blockquote></div>
    @else
        <div class="fb-page" data-href="https://www.facebook.com/youthportalaz/" data-tabs="timeline" data-width="343" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/youthportalaz/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/youthportalaz/">Youth Portal</a></blockquote></div>
    @endif
@endsection