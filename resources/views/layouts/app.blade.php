<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>YouthPortal</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet" />--}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app" class="container_wrapper">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="logo" class="logo_img"/></a>
                    </div>
                    <div class="col-sm-12 col-md-6 search_container">
                        <div class="input-group mb-3 search_btn">
                            <input type="search" class="form-control" placeholder="поиск" aria-label="search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search search_btn_icon" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-light menu_container">
            @yield('main_menu')
        </nav>
        @yield('top_news')
        <section>
            <div class="container-fluid main_container">
                <div class="row main_inner_container">
                    <div class="col-sm-12 col-md-8">
                        @yield('inner_content')
                    </div>
                    <!-- Corner content -->
                    <div class="col-sm-12 col-md-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 news_category_container hover_class">
                                <a href="#"><p><span class="news_category_span">Присоединяйтесь к нам</span></p></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-4 networks_cards_container">
                                <div class="networks_card networks_card_first">
                                    <img class="card_img" src="{{ asset('images/f.png') }}" alt="facebook">
                                    <div class="card_body">
                                        <p class="card_text"><span class="networks_numbers">7.000</span><span class="networks_second_span">izləyici</span></p>
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
                                        <p class="card_text"><span>Rss vasitəsi ilə izləyin</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 video_container_2 hover_class">
                                <div>
                                    <p class="video_text"><a><span class="video_text_span">Видео дня</span></a></p>
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
                        <div class="row">
                            <div class="col-sm-12 col-md-12 life_style_container_second hover_class">
                                <nav class="navbar navbar-expand-lg navbar-light comment_menu_container">
                                    <div class="collapse navbar-collapse comment_menu_inner" id="navbarNav">
                                        <ul class="navbar-nav">
                                            <li class="nav-item active">
                                                <a class="nav-link" href="#"><p>Новостная лента<span class="sr-only">(current)</span></p></a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="row">
                            @yield('news_ribbon')
                            {{--<div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="accordion_section_name">
                                        <a href="#"><i class="fa fa-minus-square" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-md-8">
                                    <p class="accordion_text">Proserue Cubre</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <p class="accordion_text_big">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col_md-4">
                                    <div class="accordion_section_name_plus">
                                        <a href="#"><p><i class="fa fa-plus-square" aria-hidden="true"></i></p></a>
                                        <a href="#"><p><i class="fa fa-plus-square" aria-hidden="true"></i></p></a>
                                        <a href="#"><p><i class="fa fa-plus-square" aria-hidden="true"></i></p></a>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-md-8">
                                    <p class="name_plus__text">Some text</p>
                                    <p class="name_plus__text">Something here</p>
                                    <p class="name_plus__text">Some text</p>
                                </div>
                            </div>--}}
                            <div class="row spot_container_second">
                                <div class="col-sm-12 col-md-12">
                                    <div>
                                        <a><p class="sport_text"><span class="sport_text_span">ADS SPOT</span></p></a>
                                    </div>
                                    <div>
                                        <a><p class="sport_text"><span class="sport_text_span">FACEBOOK</span></p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="container-fluid">
                <div class="row footer_inner">
                    <div class="col-sm-12 col-md-3 hover_class footer_category">
                        <a href="#" class="footer_a"><p class="footer_p"><span class="news_category_span">TWEETS</span></p></a>
                    </div>
                    <div class="col-sm-12 col-md-3 hover_class footer_category">
                        <a href="#" class="footer_a"><p class="footer_p"><span class="news_category_span">NAVIGATION</span></p></a>
                        <ul class="footer_ul">
                            <li><a><i class="fa fa-chevron-right" aria-hidden="true"></i><span>  KATEGORIYA</span></a></li>
                            <li><a><i class="fa fa-chevron-right" aria-hidden="true"></i><span>  KATEGORIYA</span></a></li>
                            <li><a><i class="fa fa-chevron-right" aria-hidden="true"></i><span>  KATEGORIYA</span></a></li>
                            <li><a><i class="fa fa-chevron-right" aria-hidden="true"></i><span>  KATEGORIYA</span></a></li>
                            <li><a><i class="fa fa-chevron-right" aria-hidden="true"></i><span>  KATEGORIYA</span></a></li>
                            <li><a><i class="fa fa-chevron-right" aria-hidden="true"></i><span>  KATEGORIYA</span></a></li>
                            <li><a><i class="fa fa-chevron-right" aria-hidden="true"></i><span>  KATEGORIYA</span></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-3 hover_class footer_category">
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
                    </div>
                    <div class="col-sm-12 col-md-3 hover_class footer_category">
                        <a href="#" class="footer_a"><p class="footer_p"><span class="news_category_span">ABOUT</span></p></a>
                        <p class="footer_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/9aed91e10e.js"></script>
</body>
</html>
