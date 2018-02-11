@extends('layouts.app')


@section('header')
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <a href="{{ url('/'.$lang) }}"><img src="{{ asset('images/logo.png') }}" alt="logo" class="logo_img"/></a>
                </div>
                <div class="col-sm-12 col-md-6 search_container">
                    <div class="input-group mb-3 search_btn float-right">
                        <input type="search" class="form-control" placeholder="@if ($lang == 'az') axtar @else поиск @endif" aria-label="search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search search_btn_icon" aria-hidden="true"></i></button>
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
                <a class="nav-link" href="{{url('/'.$lang)}}"><p>@if ($lang == 'az') Əsas @else Главная @endif <span class="sr-only">(current)</span></p></a>
            </li>
            @foreach($sections as $section)
                @if ($section->id == $news_main->first()->section_id)
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/'.$lang.'/section/'.$section->id)}}"><p>@if ($lang == 'az'){{ $section->name_az }}@else{{ $section->name_ru }}@endif</p></a>
                </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/'.$lang.'/section/'.$section->id)}}"><p>@if ($lang == 'az'){{ $section->name_az }}@else{{ $section->name_ru }}@endif</p></a>
                    </li>
                @endif
            @endforeach
        </ul>
        <span class="my-2 my-lg-0">
            @if ($lang == 'az')
                <a href="{{url('/ru')}}" class="btn btn-danger lang_class">По-русски</a>
            @else
                <a href="{{url('/az')}}" class="btn btn-danger lang_class">Azərbaycanca</a>
            @endif
        </span>
    </div>
@endsection
@section('inner_content')
    <div class="container-fluid news_details_container">
        <div class="row">
            <div class="col-sm-12 col-md-12 life_style_big_news_container">
                <div class="big_news_container__inner">
                    @if ($news_main->count() > 0)
                        <img src="{{url('storage/images/'.$news_main->first()->photo)}}" class="float-left" alt="news photo"/>
                                        <h6 class="h6_settings">{{$news_main->first()->name}}</h6>
                                        <p class="life_style_time">{{$news_main->first()->activity_start->format('d.m.Y H:i')}} // {{$news_main->first()->section->name_ru}} // Нет комментариев</p>
                            <p class="big_news_text">{{$news_main->first()->text}}</p>
                            <div class="news_images">
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
    <div class="row inner_page_ribbon">
        <div class="col-sm-12 col-md-12 news_category_container hover_class">
            <p class="line_width ribbon_text"><span class="news_category_span">@if ($lang == 'ru') НОВОСТНАЯ ЛЕНТА @else XƏBƏR LENTİ @endif </span></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 comments_container_margin">
            @foreach ($news as $news_item)
                <div class="life_style_comments_container">
                    <a href="{{url($lang.'/news_details/'.$news_item->id)}}" class="life_style_comments_container_text">
                        <p class="life_style_comments_container_text title_style @if ($news_item->important) title_style_important @endif @if ($news_item->very_important) title_style_very_important @endif">{{$news_item->name}}</p>
                    </a>
                    <p class="popular_news_time">{{$news_item->activity_start->format('d.m.Y h:i')}} // @if($lang == 'az') {{$news_item->section->name_az}} @else {{$news_item->section->name_ru}} @endif // No Comments</p>
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
                <p class="video_text"><a><span class="video_text_span">@if($lang == 'az') GÜNÜN VİDEOSU @else ВИДЕО ДНЯ @endif</span></a></p>
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
            <p class="video_text"><span class="news_category_span">@if($lang == 'az') BİZƏ QOŞULUN @else ПРИСОЕДИНЯЙТЕСЬ К НАМ @endif</span></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4 networks_cards_container">
            <div class="networks_card networks_card_first">
                <img class="card_img" src="{{ asset('images/f.png') }}" alt="facebook">
                <div class="card_body">
                    <p class="card_text"><span class="networks_numbers">7.000</span><span class="networks_second_span">@if($lang == 'az') izləyici @else подписчиков @endif</span></p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 networks_cards_container">
            <div class="networks_card networks_card_second">
                <img class="card_img" src="{{ asset('images/o-TWITTER-570.jpg') }}" alt="facebook">
                <div class="card_body">
                    <p class="card_text"><span class="networks_numbers">3.000</span><span class="networks_second_span">followers</span></p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 networks_cards_container">
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
                    <p class="footer_p footer_a"><span class="news_category_span">@if($lang == 'az') NAVİQASİYA @else НАВИГАЦИЯ @endif</span></p>
                    <ul class="footer_ul">
                        @foreach($sections as $section)
                            <li><a href="{{url('section/'.$section->id)}}"><i class="fa fa-chevron-right" aria-hidden="true"></i><span>  @if($lang == 'ru') {{' '.$section->name_ru}} @else {{' '.$section->name_az}} @endif</span></a></li>
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
                    <p class="footer_p footer_a"><span class="news_category_span">@if($lang == 'az') HAQQIMIZDA @else О НАС @endif</span></p>
                    <p class="footer_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </footer>
    </div>
@endsection
@section('facebook_social')
    @if($lang == 'ru')
        <div class="fb-page" data-href="https://www.facebook.com/YouthPortalaz-198120266876647/" data-tabs="timeline" data-width="334" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/YouthPortalaz-198120266876647/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/YouthPortalaz-198120266876647/">YouthPortal.az</a></blockquote></div>
    @else
        <div class="fb-page" data-href="https://www.facebook.com/youthportalaz/" data-tabs="timeline" data-width="343" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/youthportalaz/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/youthportalaz/">Youth Portal</a></blockquote></div>
    @endif
@endsection