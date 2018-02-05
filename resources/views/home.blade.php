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
@section('top_news')
    <section>
        <div class="container-fluid news_cards_main">
            <div class="row">
                <div class="col-sm-6 news_card">
                    @foreach($news_very_actual as $very_actual)
                        <div class="card text-white news_card_container news_card_container_margin">
                            <img class="card-img" src="storage/images/{{$very_actual->photo}}" alt="Card image">
                            <div class="card-img-overlay news_card_overlay">
                                <p class="card-text time_text"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$very_actual->activity_start}}</p>
                                <h5 class="card-title title_text">{{$very_actual->name}}</h5>
                                <p class="card-text main_text">{{$very_actual->tagline}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-sm-6 news_card news_card_second">
                    <div class="news_card_container_second">
                        @foreach($news_actual as $actual)
                        <div class="card text-white actual">
                            <img class="card-img" src="storage/images/{{$actual->photo}}" alt="Card image">
                            <div class="card-img-overlay card_overlay_little">
                                <p class="card-text time_text"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$actual->activity_start}}</p>
                                <h5 class="card-title title_text">{{$actual->name}}</h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('inner_content')
    <div class="row">
        <div class="col-sm-12 col-md-6 news_category_container hover_class">
            <a href="#"><p><span class="news_category_span">ПОПУЛЯРНЫЕ НОВОСТИ</span></p></a>
        </div>
        <div class="col-sm-12 col-md-6 news_category_container hover_class">
            <a href="#"><p><span class="news_category_span">ГОРЯЧИЕ НОВОСТИ</span></p></a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 popular_news_container">
            @foreach ($news_views as $news_view)
                <div class="popular_news_container__img">
                    <img src="storage/images/{{$news_view->photo_150}}" alt="news photo" class="popular_news_img"/>
                    <div class="line_p_margin_2"><p class="line_p_2"></p></div>
                </div>
            @endforeach
        </div>
        <div class="col-sm-3 popular_news_container_second">
            @foreach ($news_views as $news_view)
                <div class="popular_news_container_second__text">
                    <p class="popular_news_time">{{$news_view->activity_start}}</p>
                    <h6>{{$news_view->name}}</h6>
                </div>
                @endforeach
        </div>
        <div class="col-sm-3 hot_news_container">
            @foreach ($news_very_important as $very_important)
            <div class="popular_news_container__img">
                <img src="storage/images/{{$very_important->photo_150}}" alt="news photo"/>
                <div class="line_p_margin_2"><p class="line_p_2"></p></div>
            </div>
            @endforeach
        </div>
        <div class="col-sm-3 hot_news_container_second">
            @foreach ($news_very_important as $very_important)
            <div class="popular_news_container_second__text">
                <p class="popular_news_time">{{$very_important->activity_start}}</p>
                <h6>{{$very_important->name}}</h6>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row new_category_row hover_class">
        <div class="col-sm-12 col-md-12 news_category_container life_style_container">
            <p><a href="#"><span class="news_category_span">HƏYAT TƏRZİ</span></a></p>
            <div class="chevron_right_left_div">
                <a href="#" class="chevron_margin"><i class="fa fa-chevron-left category_span__chevron" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-chevron-right category_span__chevron" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="row life_style_main">
        <div class="col-sm-12 col-md-6 life_style_big_news_container">
            @foreach ($news_policy as $policy)
            <div class="big_news_container__inner">
                <img src="storage/images/{{$policy->photo}}" alt="news photo"/>
                <h6 class="h6_settings">{{$policy->name}}</h6>
                <p class="life_style_time">{{$policy->activity_start}} // Политика // Нет комментариев</p>
                <p class="big_news_text">{{$policy->tagline}}</p>
            </div>
            @endforeach
        </div>
        <div class="col-sm-12 col-md-3 hot_news_container life_style_little_news_container">
            <div>
                <img src="{{ asset('images/SILO_fb_022117_stockNews_shutter.jpg') }}" alt="news photo"/>
                <div class="line_p_margin_2"><p class="line_p_2"></p></div>
            </div>
            <div class="popular_news_container__img">
                <img src="{{ asset('images/7deb467507756b82a9cfeb84d6a27aab.jpg') }}" alt="news photo"/>
                <div class="line_p_margin_2"><p class="line_p_2"></p></div>
            </div>
            <div class="popular_news_container__img">
                <img src="{{ asset('images/tn_ir-iran-russia-mou-20171218.jpg') }}" alt="news photo"/>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 hot_news_container_second life_style_little_news_container little_news_container_margin">
            <div>
                <p class="popular_news_time">17 Fevral, 2018</p>
                <h6>Some text about something</h6>
                <p></p>
            </div>
            <div class="popular_news_container_second__text">
                <p class="popular_news_time">17 Fevral, 2018</p>
                <h6>Some text about something</h6>
                <p></p>
            </div>
            <div class="popular_news_container_second__text">
                <p class="popular_news_time">17 Fevral, 2018</p>
                <h6>Some text about something</h6>
                <p></p>
            </div>
        </div>
    </div>
    <div class="row world_news_main hover_class">
        <div class="col-sm-12 col-md-12 news_category_container life_style_container">
            <p><a href="#"><span class="news_category_span">WORLD NEWS</span></a></p>
            <div class="chevron_right_left_div">
                <a href="#" class="chevron_margin"><i class="fa fa-chevron-left category_span__chevron" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-chevron-right category_span__chevron" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 life_style_big_news_container">
            <div class="big_news_container__inner">
                <img src="{{ asset('images/man-coffee-cup-pen.jpg') }}" alt="news photo"/>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="big_news_second_text">
                <h6 class="h6_settings">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</h6>
                <p class="popular_news_time">17 Fevral, 2018 // World News // No Comments</p>
                <p class="big_news_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,. Ut enim ad ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>
        </div>
    </div>
    <div class="row world_news_container_little">
        <div class="col-sm-6 col-md-3 popular_news_container">
            <div>
                <img src="{{ asset('images/_96116747_youngpeopleab.jpg') }}" alt="news photo" class="popular_news_img"/>
                <div class="line_p_margin_2"><p class="line_p_2"></p></div>
            </div>
            <div class="popular_news_container__img">
                <img src="{{ asset('images/mother-holding-baby-landing.jpg') }}" alt="news photo" class="popular_news_img"/>
                <div class="line_p_margin_2"><p class="line_p_2"></p></div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 popular_news_container_second">
            <div>
                <p class="popular_news_time">17 Fevral, 2018</p>
                <h6>Some text about something</h6>
                <p></p>
            </div>
            <div class="popular_news_container_second__text">
                <p class="popular_news_time">17 Fevral, 2018</p>
                <h6>Some text about something</h6>
                <p></p>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 hot_news_container">
            <div>
                <img src="{{ asset('images/SILO_fb_022117_stockNews_shutter.jpg') }}" alt="news photo"/>
                <div class="line_p_margin_2"><p class="line_p_2"></p></div>
            </div>
            <div class="popular_news_container__img">
                <img src="{{ asset('images/7deb467507756b82a9cfeb84d6a27aab.jpg') }}" alt="news photo"/>
                <div class="line_p_margin_2"><p class="line_p_2"></p></div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 hot_news_container_second">
            <div>
                <p class="popular_news_time">17 Fevral, 2018</p>
                <h6>Some text about something</h6>
                <p></p>
            </div>
            <div class="popular_news_container_second__text">
                <p class="popular_news_time">17 Fevral, 2018</p>
                <h6>Some text about something</h6>
                <p></p>
            </div>
        </div>
    </div>
    <div class="row world_news_main">
        <div class="col-sm-12 col-md-6 news_category_container hover_class">
            <a href="#"><p class="news_category_p_width"><span class="news_category_span">POPULYAR XƏBƏRLƏR</span></p></a>
        </div>
        <div class="col-sm-12 col-md-6 news_category_container hover_class">
            <a href="#"><p class="news_category_p_width"><span class="news_category_span">QAYNAR XƏBƏRLƏR</span></p></a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 life_style_big_news_container_2">
            <div class="big_news_container__inner">
                <img src="{{ asset('images/man-coffee-cup-pen.jpg') }}" alt="news photo"/>
                <h6 class="h6_settings">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</h6>
                <p class="popular_news_time">17 Fevral, 2018 // World News // No Comments</p>
                <p class="big_news_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 life_style_big_news_container_2">
            <div class="big_news_container__inner">
                <img src="{{ asset('images/man-coffee-cup-pen.jpg') }}" alt="news photo"/>
                <h6 class="h6_settings">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</h6>
                <p class="popular_news_time">17 Fevral, 2018 // World News // No Comments</p>
                <p class="big_news_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>
        </div>
    </div>
    <div class="row world_news_container_little_2">
        <div class="col-sm-6 col-md-3 popular_news_container">
            <div>
                <img src="{{ asset('images/_96116747_youngpeopleab.jpg') }}" alt="news photo" class="popular_news_img"/>
                <div class="line_p_margin_2"><p class="line_p_2"></p></div>
            </div>
            <div class="popular_news_container__img">
                <img src="{{ asset('images/mother-holding-baby-landing.jpg') }}" alt="news photo" class="popular_news_img"/>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 popular_news_container_second">
            <div>
                <p class="popular_news_time">17 Fevral, 2018</p>
                <h6>Some text about something</h6>
                <p></p>
            </div>
            <div class="popular_news_container_second__text">
                <p class="popular_news_time">17 Fevral, 2018</p>
                <h6>Some text about something</h6>
                <p></p>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 hot_news_container">
            <div>
                <img src="{{ asset('images/SILO_fb_022117_stockNews_shutter.jpg') }}" alt="news photo"/>
                <div class="line_p_margin_2"><p class="line_p_2"></p></div>
            </div>
            <div class="popular_news_container__img">
                <img src="{{ asset('images/7deb467507756b82a9cfeb84d6a27aab.jpg') }}" alt="news photo"/>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 hot_news_container_second">
            <div>
                <p class="popular_news_time">17 Fevral, 2018</p>
                <h6>Some text about something</h6>
                <p></p>
            </div>
            <div class="popular_news_container_second__text">
                <p class="popular_news_time">17 Fevral, 2018</p>
                <h6>Some text about something</h6>
                <p></p>
            </div>
        </div>
    </div>
@endsection

@section('news_ribbon')
    <div class="col-sm-12 col-md-12 comments_container_margin">
        @foreach ($news as $news_item)
            <div class="life_style_comments_container">
                <p class="life_style_comments_container_text">{{$news_item->name}}</p>
                <p class="popular_news_time">{{$news_item->activity_start->format('d.m.Y h:i')}} // World News // No Comments</p>
                <div class="line_p_margin_3"><p class="line_p_2"></p></div>
            </div>
        @endforeach
    </div>
@endsection
