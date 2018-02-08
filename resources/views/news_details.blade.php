@extends('layouts.app')

@section('search_input')
    <div class="col-sm-12 col-md-6 search_container">
        <div class="input-group mb-3 search_btn">
            <input type="search" class="form-control" placeholder="@if ($lang == 'az') axtar @else поиск @endif" aria-label="search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search search_btn_icon" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
@endsection
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