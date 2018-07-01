<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118578066-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118578066-1');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}" />
    <meta http-equiv="refresh" content="120">

    <!-- Facebook OG tags -->
    <meta property="og:url"           content="{{ Request::url() }}" />
    <meta property="og:type"          content="article" />

    <meta property="og:site_name"     content="{{ url('/') }}" />
    <meta property="fb:admins"        content="1661727574">
    @if (isset($news_main))
        <meta property="og:title"         content="{{ strip_tags($news_main->name) }}" />
        <meta property="og:description"   content="{{ strip_tags($news_main->tagline) }}" />
        <meta property="og:image"         content="{{ url('/storage/images/'.$news_main->photo) }}" />

        <meta name="keywords" content="{{ strip_tags($news_main->tags) }}" />
        <meta name="description" content="{{ strip_tags($news_main->tagline) }}" />
    @else
        <meta name="description" content="Youth Portal {{ (($lang ?? '') == 'az') ? '– gənclərin saytıdır. Siz burda gənclərin həyata keçirdiyi layihələr, o cümlədən  Gənclər və İdman nazirliyinin dəstəyi ilə reallaşan layihələr ilə tanış ola bilərsiniz.' : '– молодежный сайт, где вы можете ознакомиться с проектами, реализуемыми в молодежной сфере, в том числе при поддержке Министерства молодежи и спорта Азербайджана.' }}" />
    @endif

    <title>{{ ($news_main->name ?? '' != '')? $news_main->name . ' - ' : '' }}Youth Portal {{ (($lang ?? '') == 'az') ? '- Gənclər portalı' : '- Молодежный портал' }}</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet" />--}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.standalone.min.css" />

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=148990098504245&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <div id="app" class="container_wrapper">
        @yield('header')
        <div class="menu_wrapper">
            <nav class="navbar navbar-expand-md navbar-light menu_container">
                <button class="navbar-toggler nav_btn" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon nav_btn_span"></span>
                </button>
                @yield('main_menu')
                <a class="login_button" target="_blank" href="{{ url('/admin') }}">@if (($lang ?? '') == 'az') Sayta giriş @else Войти на сайт @endif</a>
            </nav>
        </div>
        <div class="informers_block">
            <div class="container-fluid informers_container">
                <div class="row">
                    <div class="col-12 col-lg-2">
                        <div class="weatherContainer container-fluid">
                            <div class="row">
                                <div class="col no-gutters">{{{ (($lang ?? '') == 'az') ? 'Bakı' : 'Баку'}}}</div>
                                <div class="col no-gutters" id="weatherImageContainer"></div>
                                <div class="col no-gutters" id="weatherTempContainer"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-10">
                        <div class="ratesContainer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <span class="currency">USD</span>
                                        <span id="currencyUSD"></span>
                                    </div>
                                    <div class="col">
                                        <span class="currency">EUR</span>
                                        <span id="currencyEUR"></span>
                                    </div>
                                    <div class="col">
                                        <span class="currency">GBP</span>
                                        <span id="currencyGBP"></span>
                                    </div>
                                    <div class="col">
                                        <span class="currency">RUB</span>
                                        <span id="currencyRUB"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid-flex">
                <div class="d-none d-lg-block main_col">
                    <div class="left_block_ads pull-right">
                        <div style="width: 120px;"></div>
                    </div>
                </div>
                <div class="main_col">
                    @yield('top_news')
                    <section class="root_section">
                        <div class="container-fluid main_container">
                            <div class="row main_inner_container">
                                <div class="col-sm-12 col-md-8 inner_content_container">
                                    @yield('inner_content')
                                </div>
                                <!-- Corner content -->

                                <div class="col-sm-12 col-md-4">
                                    @yield('news_ribbon')
                                    @yield('video_container')
                                    @include('social_networks')

                                    <div class="row spot_container_second">
                                        <div class="col-sm-12 col-md-12">
                                            {{--<div>--}}
                                                {{--<a><p class="sport_text"><span class="sport_text_span">ОПРОС</span></p></a>--}}
                                            {{--</div>--}}
                                            <div>
                                                <a><p class="sport_text"><span class="sport_text_span">АРХИВ НОВОСТЕЙ</span></p></a>
                                            </div>
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <div id="newsArchiveCalendar"></div>
                                            </div>
                                            <div>
                                                <a><p class="sport_text"><span class="sport_text_span">FACEBOOK</span></p></a>
                                            </div>
                                            @yield('facebook_social')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="d-none d-lg-block main_col">
                    <div class="right_block_ads">
                        <div class="ad">
                            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="120" height="166" id="aquatic" align="">
                                <param name="movie" value="{{ asset('images/banners/aquatic.swf') }}"> <param name="quality" value="high"> <param name="bgcolor" value="#FFFFFF"> <embed src="{{ asset('images/banners/aquatic.swf') }}" quality="high" bgcolor="#FFFFFF" width="120" height="166" name="aquatic" align="" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">
                            </object>
                        </div>
                        <div class="ad">
                            <a target="_blank" href="http://www.genclerpaytaxti.az"><img alt="Gənclər Paytaxtı" src="{{ asset('images/banners/genclerpaytaxti.png') }}" width="120"></a>
                        </div>
                        <div class="ad">
                            <a target="_blank" href="http://www.salto-youth.net/rc/eeca/eecacooperation/"><img alt="Salto Youth" src="{{ asset('images/banners/salto_youth.png') }}"></a>
                        </div>
                        {{--<div class="ad">--}}
                            {{--<a target="_blank" href="http://www.youthforum.org"><img src="{{ asset('images/banners/youthforum.org.png') }}"></a>--}}
                        {{--</div>--}}
                        {{--<div class="ad">--}}
                            {{--<a target="_blank" href="http://www.ec.europa.eu/youth/"><img src="{{ asset('images/banners/european_commision.gif') }}"></a>--}}
                        {{--</div>--}}
                        <div class="ad">
                            <a target="_blank" href="http://www.tehsil.gov.az"><img alt="Tehsil Nazirliyi" src="{{ asset('images/banners/tehsil.gov.az.png') }}"></a>
                        </div>
                    </div>
                </div>
        </div>

        @include('footer')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/9aed91e10e.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.az.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ru.min.js"></script>
        <script src="{{ asset('js/custom.js') }}"></script>

    </div>
    <!--LiveInternet counter-->
    <script type="text/javascript">
        new Image().src = "//counter.yadro.ru/hit?r"+
            escape(document.referrer)+((typeof(screen)=="undefined")?"":
                ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
                screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
            ";h"+escape(document.title.substring(0,150))+
            ";"+Math.random();
    </script>
    <!--/LiveInternet-->
    <!--Openstat-->
    <script type="text/javascript">
        var openstat = { counter: 2175107, image: 5082, color: "c3c3c3", next: openstat, track_links: "all" };
        (function(d, t, p) {
            var j = d.createElement(t); j.async = true; j.type = "text/javascript";
            j.src = ("https:" == p ? "https:" : "http:") + "//openstat.net/cnt.js";
            var s = d.getElementsByTagName(t)[0]; s.parentNode.insertBefore(j, s);
        })(document, "script", document.location.protocol);
    </script>
    <!--/Openstat-->
</body>
</html>
