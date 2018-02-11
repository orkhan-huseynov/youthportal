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
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/'.$lang)}}"><p>@if ($lang == 'az') Əsas @else Главная @endif <span class="sr-only">(current)</span></p></a>
            </li>
            @foreach($sections as $section)
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/'.$lang.'/section/'.$section->id)}}"><p>@if ($lang == 'az'){{ $section->name_az }}@else{{ $section->name_ru }}@endif</p></a>
                </li>
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
@section('top_news')
    <section>
        <div class="container-fluid news_cards_main">
            <div class="row">
                <div class="col-sm-6 news_card">
                    @foreach($news_very_actual as $very_actual)
                        <a href="{{url($lang.'/news_details/'.$very_actual->id)}}">
                            <div class="card text-white news_card_container news_card_container_margin">
                                <img class="card-img" src="storage/images/{{$very_actual->photo}}" alt="Card image">
                                <div class="card-img-overlay news_card_overlay">
                                    <h5 class="card-title title_text">{{$very_actual->name}}</h5>
                                    <!-- <p class="card-text main_text">{{$very_actual->tagline}}</p> -->
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="col-sm-6 news_card news_card_second">
                    <div class="news_card_container_second">
                        @foreach($news_actual as $actual)
                            <div class="card text-white actual">
                                <a href="{{url($lang.'/news_details/'.$actual->id)}}">
                                    <img class="card-img" src="storage/images/{{$actual->photo}}" alt="Card image">
                                    <div class="card-img-overlay card_overlay_little">
                                        <h6 class="card-title title_text">{{$actual->name}}</h6>
                                    </div>
                                </a>
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
        <div class="col-sm-12 col-md-6 popular_news_container">
            <div class="row">
                <div class="col-sm-12 col-md-12 news_category_container hover_class">
                    <a href="#"><p><span class="news_category_span">@if ($lang == 'ru') ПОПУЛЯРНЫЕ НОВОСТИ @else POPULYAR XƏBƏRLƏR @endif </span></p></a>
                </div>
            </div>
            @foreach ($news_views as $news_view)
                <div class="row pop_hot_inner">
                    <div class="col-sm-6 col-md-6 popular_inner">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$news_view->id)}}">
                                <img src="storage/images/{{$news_view->photo_150}}" alt="news photo" class="popular_news_img"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 popular_inner">
                        <div class="popular_news_container_second__text popular_news_container_second">
                            <p class="popular_news_time">{{$news_view->activity_start}}</p>
                            <a href="{{url($lang.'/news_details/'.$news_view->id)}}" class="title_a">
                                <h6 class="title_style">{{$news_view->name}}</h6>
                            </a>
                        </div>
                    </div>
                </div>
                </a>
                <div class="row for_line">
                    <div class="col-sm-12 col-md-12">
                        <div class="line_p_margin_2"><p class="line_p_2"></p></div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-sm-12 col-md-6 hot_news_container">
            <div class="row">
                <div class="col-sm-12 col-md-12 news_category_container hover_class">
                    <a href="#"><p><span class="news_category_span">@if ($lang == 'ru') ГОРЯЧИЕ НОВОСТИ @else QAYNAR XƏBƏRLƏR @endif </span></p></a>
                </div>
            </div>
            @foreach ($news_very_important as $very_important)
                <div class="row pop_hot_inner">
                    <div class="col-sm-12 col-md-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$very_important->id)}}">
                                <img src="storage/images/{{$very_important->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="popular_news_container_second__text hot_news_container_second">
                            <p class="popular_news_time">{{$very_important->activity_start}}</p>
                            <a href="{{url($lang.'/news_details/'.$very_important->id)}}" class="title_a">
                                <h6 class="title_style">{{$very_important->name}}</h6>
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
    {{-- policy --}}
    <div class="row new_category_row hover_class">
        <div class="col-sm-12 col-md-12 news_category_container life_style_container">
            <p><a href="#"><span class="news_category_span"> @if ($lang == 'ru') ПОЛИТИКА @else SİYASƏT @endif </span></a></p>
            <div class="chevron_right_left_div">
                <a href="#" class="chevron_margin"><i class="fa fa-chevron-left category_span__chevron" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-chevron-right category_span__chevron" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="row life_style_main">
        <div class="col-sm-12 col-md-6 life_style_big_news_container">
            <div class="big_news_container__inner">
                @if ($news_policy->count() > 0)
                    <a href="{{url($lang.'/news_details/'.$news_policy->first()->id)}}" class="title_style">
                        <img src="storage/images/{{$news_policy->first()->photo}}" alt="news photo"/>
                        <h6 class="h6_settings title_style">{{$news_policy->first()->name}}</h6>
                        <p class="life_style_time">{{$news_policy->first()->activity_start}} // {{$news_policy->first()->section->name_ru}} // Нет комментариев</p>
                        <p class="big_news_text title_style">{{$news_policy->first()->tagline}}</p>
                    </a>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-6 hot_news_container life_style_little_news_container">
                @php
                    $i = 0;
                @endphp
            @foreach ($news_policy as $policy)
                    @php
                        $i++;
                    @endphp
                @if ($i == 1)
                    @continue
                    @endif
                <div class="row policy_news">
                    <div class="col-sm-6 col-md-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$policy->id)}}">
                                <img src="storage/images/{{$policy->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$policy->activity_start}}</p>
                            <a href="{{url($lang.'/news_details/'.$policy->id)}}">
                                <h6 class="title_style">{{$policy->name}}</h6>
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
    {{-- economy --}}
    <div class="row new_category_row hover_class">
        <div class="col-sm-12 col-md-12 news_category_container life_style_container">
            <p><a href="#"><span class="news_category_span">@if ($lang == 'ru') ЭКОНОМИКА @else İQTİSADİYYƏT @endif </span></a></p>
            <div class="chevron_right_left_div">
                <a href="#" class="chevron_margin"><i class="fa fa-chevron-left category_span__chevron" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-chevron-right category_span__chevron" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="row life_style_main">
        <div class="col-sm-12 col-md-6 life_style_big_news_container">
            <div class="big_news_container__inner">
                @if ($news_economy->count() > 0)
                    <a href="{{url($lang.'/news_details/'.$news_economy->first()->id)}}" class="title_style">
                        <img src="storage/images/{{$news_economy->first()->photo}}" alt="news photo"/>
                        <h6 class="h6_settings">{{$news_economy->first()->name}}</h6>
                        <p class="life_style_time">{{$news_economy->first()->activity_start}} // {{$news_economy->first()->section->name_ru}} // Нет комментариев</p>
                        <p class="big_news_text">{{$news_economy->first()->tagline}}</p>
                    </a>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-6 hot_news_container life_style_little_news_container">
            @php
                $i = 0;
            @endphp
            @foreach ($news_economy as $economy)
                @php
                    $i++;
                @endphp
                @if($i == 1)
                    @continue;
                @endif
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$economy->id)}}">
                                <img src="storage/images/{{$economy->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$economy->activity_start}}</p>
                            <a href="{{url($lang.'/news_details/'.$economy->id)}}">
                                <h6>{{$economy->name}}</h6>
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
    {{-- sport --}}
    <div class="row new_category_row hover_class">
        <div class="col-sm-12 col-md-12 news_category_container life_style_container">
            <p><a href="#"><span class="news_category_span">@if ($lang == 'ru') СПОРТ @else İDMAN @endif </span></a></p>
            <div class="chevron_right_left_div">
                <a href="#" class="chevron_margin"><i class="fa fa-chevron-left category_span__chevron" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-chevron-right category_span__chevron" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="row life_style_main">
        <div class="col-sm-12 col-md-6 life_style_big_news_container">
            <div class="big_news_container__inner">
                @if ($news_sport->count() > 0)
                    <a href="{{url($lang.'/news_details/'.$news_sport->first()->id)}}">
                        <img src="storage/images/{{$news_sport->first()->photo}}" alt="news photo"/>
                        <h6 class="h6_settings">{{$news_sport->first()->name}}</h6>
                        <p class="life_style_time">{{$news_sport->first()->activity_start}} // {{$news_sport->first()->section->name_ru}} // Нет комментариев</p>
                        <p class="big_news_text">{{$news_sport->first()->tagline}}</p>
                    </a>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-6 hot_news_container life_style_little_news_container">
            @php
                $i = 0;
            @endphp
            @foreach ($news_sport as $sport)
                @php
                    $i++;
                @endphp
                @if($i == 1)
                    @continue;
                @endif
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$sport->id)}}">
                                <img src="storage/images/{{$sport->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$sport->activity_start}}</p>
                            <a href="{{url($lang.'/news_details/'.$sport->id)}}">
                                <h6>{{$sport->name}}</h6>
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
    {{-- education --}}
    <div class="row new_category_row hover_class">
        <div class="col-sm-12 col-md-12 news_category_container life_style_container">
            <p><a href="#"><span class="news_category_span">@if ($lang == 'ru') ОБРАЗОВАНИЕ @else TƏHSİL @endif </span></a></p>
            <div class="chevron_right_left_div">
                <a href="#" class="chevron_margin"><i class="fa fa-chevron-left category_span__chevron" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-chevron-right category_span__chevron" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="row life_style_main">
        <div class="col-sm-12 col-md-6 life_style_big_news_container">
            <div class="big_news_container__inner">
                @if ($news_education->count() > 0)
                    <a href="{{url($lang.'/news_details/'.$news_education->first()->id)}}">
                        <img src="storage/images/{{$news_education->first()->photo}}" alt="news photo"/>
                        <h6 class="h6_settings">{{$news_education->first()->name}}</h6>
                        <p class="life_style_time">{{$news_education->first()->activity_start}} // {{$news_education->first()->section->name_ru}} // Нет комментариев</p>
                        <p class="big_news_text">{{$news_education->first()->tagline}}</p>
                    </a>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-6 hot_news_container life_style_little_news_container">
            @php
                $i = 0;
            @endphp
            @foreach ($news_education as $education)
                @php
                    $i++;
                @endphp
                @if($i == 1)
                    @continue;
                @endif
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$education->id)}}">
                                <img src="storage/images/{{$education->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$education->activity_start}}</p>
                            <h6>{{$education->name}}</h6>
                            <p></p>
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
    {{-- show buisness/ culture --}}
    <div class="row new_category_row hover_class">
        <div class="col-sm-12 col-md-12 news_category_container life_style_container">
            <p><a href="#"><span class="news_category_span">@if ($lang == 'ru') КУЛЬТУРА @else MƏDƏNİYYƏT @endif </span></a></p>
            <div class="chevron_right_left_div">
                <a href="#" class="chevron_margin"><i class="fa fa-chevron-left category_span__chevron" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-chevron-right category_span__chevron" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="row life_style_main">
        <div class="col-sm-12 col-md-6 life_style_big_news_container">
            <div class="big_news_container__inner">
                @if ($news_culture->count() > 0)
                    <a href="{{url($lang.'/news_details/'.$news_culture->first()->id)}}">
                        <img src="storage/images/{{$news_culture->first()->photo}}" alt="news photo"/>
                        <h6 class="h6_settings">{{$news_culture->first()->name}}</h6>
                        <p class="life_style_time">{{$news_culture->first()->activity_start}} // {{$news_culture->first()->section->name_ru}} // Нет комментариев</p>
                        <p class="big_news_text">{{$news_culture->first()->tagline}}</p>
                    </a>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-6 hot_news_container life_style_little_news_container">
            @php
                $i = 0;
            @endphp
            @foreach ($news_culture as $culture)
                @php
                    $i++;
                @endphp
                @if($i == 1)
                    @continue;
                @endif
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$culture->id)}}">
                                <img src="storage/images/{{$culture->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$culture->activity_start}}</p>
                            <h6>{{$culture->name}}</h6>
                            <p></p>
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
    {{-- cinemania/ hightech --}}
    <div class="row new_category_row hover_class">
        <div class="col-sm-12 col-md-12 news_category_container life_style_container">
            <p><a href="#"><span class="news_category_span">HIGH-TECH</span></a></p>
            <div class="chevron_right_left_div">
                <a href="#" class="chevron_margin"><i class="fa fa-chevron-left category_span__chevron" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-chevron-right category_span__chevron" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="row life_style_main">
        <div class="col-sm-12 col-md-6 life_style_big_news_container">
            <div class="big_news_container__inner">
                @if ($news_hightech->count() > 0)
                    <a href="{{url($lang.'/news_details/'.$news_hightech->first()->id)}}">
                        <img src="storage/images/{{$news_hightech->first()->photo}}" alt="news photo"/>
                        <h6 class="h6_settings">{{$news_hightech->first()->name}}</h6>
                        <p class="life_style_time">{{$news_hightech->first()->activity_start}} // {{$news_hightech->first()->section->name_ru}} // Нет комментариев</p>
                        <p class="big_news_text">{{$news_hightech->first()->tagline}}</p>
                    </a>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-6 hot_news_container life_style_little_news_container">
            @php
                $i = 0;
            @endphp
            @foreach ($news_hightech as $hightech)
                @php
                    $i++;
                @endphp
                @if($i == 1)
                    @continue;
                @endif
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$hightech->id)}}">
                                <img src="storage/images/{{$hightech->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$hightech->activity_start}}</p>
                            <a href="{{url($lang.'/news_details/'.$hightech->id)}}">
                                <h6>{{$hightech->name}}</h6>
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
    {{-- actions/ world --}}
    <div class="row new_category_row hover_class">
        <div class="col-sm-12 col-md-12 news_category_container life_style_container">
            <p><a href="#"><span class="news_category_span">@if ($lang == 'ru') В МИРЕ @else DÜNYADA @endif </span></a></p>
            <div class="chevron_right_left_div">
                <a href="#" class="chevron_margin"><i class="fa fa-chevron-left category_span__chevron" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-chevron-right category_span__chevron" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="row life_style_main">
        <div class="col-sm-12 col-md-6 life_style_big_news_container">
            <div class="big_news_container__inner">
                @if ($news_world->count() > 0)
                    <a href="{{url($lang.'/news_details/'.$news_world->first()->id)}}" class="title_style">
                        <img src="storage/images/{{$news_world->first()->photo}}" alt="news photo"/>
                        <h6 class="h6_settings">{{$news_world->first()->name}}</h6>
                        <p class="life_style_time">{{$news_world->first()->activity_start}} // {{$news_world->first()->section->name_ru}} // Нет комментариев</p>
                        <p class="big_news_text">{{$news_world->first()->tagline}}</p>
                    </a>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-6 hot_news_container life_style_little_news_container">
            @php
                $i = 0;
            @endphp
            @foreach ($news_world as $world)
                @php
                    $i++;
                @endphp
                @if($i == 1)
                    @continue;
                @endif
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$world->id)}}">
                                <img src="storage/images/{{$world->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$world->activity_start}}</p>
                            <a href="{{url($lang.'/news_details/'.$world->id)}}">
                                <h6>{{$world->name}}</h6>
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
    {{-- auto --}}{{--
    <div class="row new_category_row hover_class">
        <div class="col-sm-12 col-md-12 news_category_container life_style_container">
            <p><a href="#"><span class="news_category_span">ЭКОНОМИКА</span></a></p>
            <div class="chevron_right_left_div">
                <a href="#" class="chevron_margin"><i class="fa fa-chevron-left category_span__chevron" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-chevron-right category_span__chevron" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="row life_style_main">
        <div class="col-sm-12 col-md-6 life_style_big_news_container">
            <div class="big_news_container__inner">
                @if ($news_economy->count() > 0)
                    <img src="storage/images/{{$news_economy->first()->photo}}" alt="news photo"/>
                    <h6 class="h6_settings">{{$news_economy->first()->name}}</h6>
                    <p class="life_style_time">{{$news_economy->first()->activity_start}} // Политика // Нет комментариев</p>
                    <p class="big_news_text">{{$news_economy->first()->tagline}}</p>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-6 hot_news_container life_style_little_news_container">
            @php
                $i = 0;
            @endphp
            @foreach ($news_economy as $economy)
                @php
                    $i++;
                @endphp
                @if($i == 1)
                    @continue;
                @endif
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="popular_news_container__img">
                            <img src="storage/images/{{$economy->photo_150}}" alt="news photo"/>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$economy->activity_start}}</p>
                            <h6>{{$economy->name}}</h6>
                            <p></p>
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
    </div>--}}
    {{--<div class="row world_news_main hover_class">
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
    </div>--}}
    {{--<div class="row world_news_container_little">
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
    </div>--}}
    {{--<div class="row world_news_main">
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
    </div>--}}
@endsection

@section('news_ribbon')
    <div class="row">
        <div class="col-sm-12 col-md-12 news_category_container hover_class">
            <p class="line_width ribbon_text"><span class="news_category_span">@if ($lang == 'ru') НОВОСТНАЯ ЛЕНТА @else XƏBƏR LENTİ @endif </span></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 comments_container_margin">
            @foreach ($news as $news_item)
                <div class="life_style_comments_container">
                    <a href="{{url($lang.'/news_details/'.$news_item->id)}}" class="life_style_comments_container_text">
                        <p class="life_style_comments_container_text title_style">{{$news_item->name}}</p>
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
                <p class="video_text"><a><span class="video_text_span">@if ($lang == 'az') GÜNÜN VİDEOSU @else ВИДЕО ДНЯ @endif</span></a></p>
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
            <p class="video_text"><span class="news_category_span">@if ($lang == 'az') BİZƏ QOŞULUN @else ПРИСОЕДИНЯЙТЕСЬ К НАМ @endif</span></p>
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
                    <p class="footer_p footer_a"><span class="news_category_span">@if($lang == 'az') NAVİQASİYA @else НАВИГАЦИЯ @endif</span></p>
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
                    <p class="footer_p footer_a"><span class="news_category_span">@if($lang == 'az') HAQQIMIZDA @else О НАС @endif</span></p>
                    <p class="footer_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </footer>
    </div>
@endsection
