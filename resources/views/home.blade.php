@extends('layouts.app')

@section('header')
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <a class="main_logo" href="{{ url('/'.$lang) }}"><img src="{{ url('images/logo.png') }}" alt="logo" class="logo_img"/></a>
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
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/'.$lang)}}"><p><span class="border_span">@if ($lang == 'az') Əsas @else Главная @endif <span class="sr-only">(current)</span></span></p></a>
            </li>
            @foreach($sections as $section)
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/'.$lang.'/section/'.$section->id)}}"><p><span class="border_span">@if ($lang == 'az'){{ $section->name_az }}@else{{ $section->name_ru }}@endif</span></p></a>
                </li>
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
@section('top_news')
    <section class="root_section">
        <div class="container-fluid news_cards_main">
            <div class="row">
                <div class="col-sm-12 col-md-6 news_card">
                    @foreach($news_very_actual as $very_actual)
                        <a href="{{url($lang.'/news_details/'.$very_actual->id)}}">
                            <div class="card text-white news_card_container news_card_container_margin">
                                <img class="card-img" src="storage/images/{{$very_actual->photo}}" alt="Card image">
                                <div class="card-img-overlay news_card_overlay">
                                    <h1 class="card-title title_text">{{ \Illuminate\Support\Str::words($very_actual->name, 100) }}</h1>
                                    <!-- <p class="card-text main_text">{{$very_actual->tagline}}</p> -->
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="col-sm-12 col-md-6 news_card news_card_second d-none d-md-block">
                    <div class="news_card_container_second">
                        @foreach($news_actual as $actual)
                            <div class="card text-white actual">
                                <a href="{{url($lang.'/news_details/'.$actual->id)}}">
                                    <img class="card-img" src="storage/images/{{$actual->photo}}" alt="Card image">
                                    <div class="card-img-overlay card_overlay_little">
                                        <h2 class="card-title title_text">{{ \Illuminate\Support\Str::words($actual->name, 100) }}</h2>
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
                    <a href="#"><p><span class="news_category_span">@if ($lang == 'ru') Молодежные новости @else Gənclər üçün xəbərlər @endif </span></p></a>
                </div>
            </div>
            @foreach ($news_views as $news_view)
                <div class="row pop_hot_inner">
                    <div class="col-md-12 col-lg-6 popular_inner">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$news_view->id)}}">
                                <img src="storage/images/{{$news_view->photo}}" alt="news photo" class="popular_news_img"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 popular_inner">
                        <div class="popular_news_container_second__text popular_news_container_second">
                            <p class="popular_news_time">{{$news_view->activity_start->format('d.m.Y H:i')}}</p>
                            <a href="{{url($lang.'/news_details/'.$news_view->id)}}" class="title_a">
                                <h6 class="title_style">{{ \Illuminate\Support\Str::words($news_view->name, 7) }}</h6>
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
                    <a href="#"><p><span class="news_category_span">@if ($lang == 'ru') Популярное @else Populyar @endif </span></p></a>
                </div>
            </div>
            @foreach ($news_very_important as $very_important)
                <div class="row pop_hot_inner">
                    <div class="col-md-12 col-lg-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$very_important->id)}}">
                                <img src="{{url('storage/images/'.$very_important->photo)}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="popular_news_container_second__text hot_news_container_second">
                            <p class="popular_news_time">{{$very_important->activity_start->format('d.m.Y H:i')}}</p>
                            <a href="{{url($lang.'/news_details/'.$very_important->id)}}" class="title_a">
                                <h6 class="title_style">{{ \Illuminate\Support\Str::words($very_important->name, 7) }}</h6>
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
            <p><a href="#"><span class="news_category_span"> @if ($lang == 'ru') Политика @else Siyasət @endif </span></a></p>
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
                        <h6 class="h6_settings_main title_style">{{$news_policy->first()->name}}</h6>
                        <p class="life_style_time">{{$news_policy->first()->activity_start->format('d.m.Y H:i')}} // {{{ ($lang == 'ru')? $news_world->first()->section->name_ru : $news_world->first()->section->name_az }}}</p>
                        <p class="big_news_text title_style">{{ strip_tags($news_policy->first()->tagline) }}</p>
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
                    <div class="col-md-12 col-lg-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$policy->id)}}">
                                <img src="storage/images/{{$policy->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$policy->activity_start->format('d.m.Y H:i')}}</p>
                            <a href="{{url($lang.'/news_details/'.$policy->id)}}">
                                <h6 class="title_style">{{ \Illuminate\Support\Str::words($policy->name, 7) }}</h6>
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
            <p><a href="#"><span class="news_category_span">@if ($lang == 'ru') Спорт @else İdman @endif </span></a></p>
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
                        <h6 class="h6_settings_main">{{$news_sport->first()->name}}</h6>
                        <p class="life_style_time">{{$news_sport->first()->activity_start->format('d.m.Y H:i')}} // {{{ ($lang == 'ru')? $news_world->first()->section->name_ru : $news_world->first()->section->name_az }}}</p>
                        <p class="big_news_text">{{ strip_tags($news_sport->first()->tagline) }}</p>
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
                    <div class="col-md-12 col-lg-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$sport->id)}}">
                                <img src="storage/images/{{$sport->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$sport->activity_start->format('d.m.Y H:i')}}</p>
                            <a href="{{url($lang.'/news_details/'.$sport->id)}}">
                                <h6>{{ \Illuminate\Support\Str::words($sport->name, 7) }}</h6>
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
            <p><a href="#"><span class="news_category_span">@if ($lang == 'ru') Образование @else Təhsil @endif </span></a></p>
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
                        <h6 class="h6_settings_main">{{$news_education->first()->name}}</h6>
                        <p class="life_style_time">{{$news_education->first()->activity_start->format('d.m.Y H:i')}} // {{{ ($lang == 'ru')? $news_world->first()->section->name_ru : $news_world->first()->section->name_az }}}</p>
                        <p class="big_news_text">{{ strip_tags($news_education->first()->tagline) }}</p>
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
                    <div class="col-md-12 col-lg-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$education->id)}}">
                                <img src="storage/images/{{$education->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$education->activity_start->format('d.m.Y H:i')}}</p>
                            <h6>{{ \Illuminate\Support\Str::words($education->name, 7) }}</h6>
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
    {{-- economy --}}
    <div class="row new_category_row hover_class">
        <div class="col-sm-12 col-md-12 news_category_container life_style_container">
            <p><a href="#"><span class="news_category_span">@if ($lang == 'ru') Общество @else Cəmiyyət @endif </span></a></p>
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
                        <h6 class="h6_settings_main">{{$news_economy->first()->name}}</h6>
                        <p class="life_style_time">{{$news_economy->first()->activity_start->format('d.m.Y H:i')}} // {{{ ($lang == 'ru')? $news_world->first()->section->name_ru : $news_world->first()->section->name_az }}}</p>
                        <p class="big_news_text">{{ strip_tags($news_economy->first()->tagline) }}</p>
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
                    <div class="col-md-12 col-lg-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$economy->id)}}">
                                <img src="storage/images/{{$economy->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$economy->activity_start->format('d.m.Y H:i')}}</p>
                            <a href="{{url($lang.'/news_details/'.$economy->id)}}">
                                <h6>{{ \Illuminate\Support\Str::words($economy->name, 7) }}</h6>
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
    {{-- cinemania/ hightech --}}
    <div class="row new_category_row hover_class">
        <div class="col-sm-12 col-md-12 news_category_container life_style_container">
            <p><a href="#"><span class="news_category_span">High-tech</span></a></p>
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
                        <h6 class="h6_settings_main">{{$news_hightech->first()->name}}</h6>
                        <p class="life_style_time">{{$news_hightech->first()->activity_start->format('d.m.Y H:i')}} // {{{ ($lang == 'ru')? $news_world->first()->section->name_ru : $news_world->first()->section->name_az }}}</p>
                        <p class="big_news_text">{{ strip_tags($news_hightech->first()->tagline) }}</p>
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
                    <div class="col-md-12 col-lg-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$hightech->id)}}">
                                <img src="storage/images/{{$hightech->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$hightech->activity_start->format('d.m.Y H:i')}}</p>
                            <a href="{{url($lang.'/news_details/'.$hightech->id)}}">
                                <h6>{{ \Illuminate\Support\Str::words($hightech->name, 7) }}</h6>
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
            <p><a href="#"><span class="news_category_span">@if ($lang == 'ru') В мире @else Dünyada @endif </span></a></p>
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
                        <h6 class="h6_settings_main">{{$news_world->first()->name}}</h6>
                        <p class="life_style_time">{{$news_world->first()->activity_start->format('d.m.Y H:i')}} // {{{ ($lang == 'ru')? $news_world->first()->section->name_ru : $news_world->first()->section->name_az }}}</p>
                        <p class="big_news_text">{{ strip_tags($news_world->first()->tagline) }}</p>
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
                    <div class="col-md-12 col-lg-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$world->id)}}">
                                <img src="storage/images/{{$world->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$world->activity_start->format('d.m.Y H:i')}}</p>
                            <a href="{{url($lang.'/news_details/'.$world->id)}}">
                                <h6>{{ \Illuminate\Support\Str::words($world->name, 7) }}</h6>
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
    {{-- f1 --}}
    <div class="row new_category_row hover_class">
        <div class="col-sm-12 col-md-12 news_category_container life_style_container">
            <p><a href="#"><span class="news_category_span">@if ($lang == 'ru') Формула 1 @else Formula 1 @endif</span></a></p>
            <div class="chevron_right_left_div">
                <a href="#" class="chevron_margin"><i class="fa fa-chevron-left category_span__chevron" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-chevron-right category_span__chevron" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="row life_style_main">
        <div class="col-sm-12 col-md-6 life_style_big_news_container">
            <div class="big_news_container__inner">
                @if ($news_f1->count() > 0)
                    <a href="{{url($lang.'/news_details/'.$news_f1->first()->id)}}" class="title_style">
                        <img src="storage/images/{{$news_f1->first()->photo}}" alt="news photo"/>
                        <h6 class="h6_settings_main">{{$news_f1->first()->name}}</h6>
                        <p class="life_style_time">{{$news_f1->first()->activity_start->format('d.m.Y H:i')}} // {{{ ($lang == 'ru')? $news_f1->first()->section->name_ru : $news_f1->first()->section->name_az }}}</p>
                        <p class="big_news_text">{{ strip_tags($news_f1->first()->tagline) }}</p>
                    </a>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-6 hot_news_container life_style_little_news_container">
            @php
                $i = 0;
            @endphp
            @foreach ($news_f1 as $f1)
                @php
                    $i++;
                @endphp
                @if($i == 1)
                    @continue;
                @endif
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/news_details/'.$f1->id)}}">
                                <img src="storage/images/{{$f1->photo_150}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$f1->activity_start->format('d.m.Y H:i')}}</p>
                            <a href="{{url($lang.'/news_details/'.$f1->id)}}">
                                <h6>{{ \Illuminate\Support\Str::words($f1->name, 7) }}</h6>
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
    {{-- photos --}}
    <div class="row new_category_row hover_class">
        <div class="col-sm-12 col-md-12 news_category_container life_style_container">
            <p><a href="#"><span class="news_category_span">@if ($lang == 'ru') Фото @else Foto @endif </span></a></p>
            <div class="chevron_right_left_div">
                <a href="#" class="chevron_margin"><i class="fa fa-chevron-left category_span__chevron" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-chevron-right category_span__chevron" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="row life_style_main">
        <div class="col-sm-12 col-md-6 life_style_big_news_container">
            <div class="big_news_container__inner">
                @if ($photos->count() > 0)
                    <a href="{{url($lang.'/photogallery_details/'.$photos->first()->id)}}" class="title_style">
                        <img src="storage/images/{{$photos->first()->cover_photo}}" alt="news photo"/>
                        <h6 class="h6_settings_main">{{{ ($lang == 'az')? $photos->first()->name_az : $photos->first()->name_ru }}}</h6>
                        <p class="life_style_time">{{$photos->first()->activity_start->format('d.m.Y H:i')}} // {{{ ($lang == 'az')? 'Foto' : 'Фото' }}}</p>
                        {{--<p class="big_news_text">{{$news_world->first()->tagline}}</p>--}}
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-6 hot_news_container life_style_little_news_container">
            @php
                $i = 0;
            @endphp
            @foreach ($photos as $photo)
                @php
                    $i++;
                @endphp
                @if($i == 1)
                    @continue;
                @endif
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="popular_news_container__img">
                            <a href="{{url($lang.'/photogallery_details/'.$photo->id)}}">
                                <img src="storage/images/{{$photo->cover_photo}}" alt="news photo"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 hot_news_container_second">
                        <div class="popular_news_container_second__text">
                            <p class="popular_news_time">{{$photo->activity_start->format('d.m.Y H:i')}}</p>
                            <a href="{{url($lang.'/news_details/'.$photo->id)}}">
                                <h6>{{{ ($lang == 'ru')? \Illuminate\Support\Str::words($photo->name_ru, 7) : \Illuminate\Support\Str::words($photo->name_az, 7) }}}</h6>
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
