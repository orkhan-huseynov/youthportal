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
        @yield('header')
        <nav class="navbar navbar-expand-xl navbar-light menu_container">
            <button class="navbar-toggler nav_btn" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon nav_btn_span"></span>
            </button>
            @yield('main_menu')
        </nav>
        @yield('top_news')
        <section>
            <div class="container-fluid main_container">
                <div class="row main_inner_container">
                    <div class="col-sm-12 col-md-8 inner_content_container">
                        @yield('inner_content')
                    </div>
                    <!-- Corner content -->

                    <div class="col-sm-12 col-md-4">
                        @yield('news_ribbon')
                        @yield('video_container')
                        @yield('networks_container')
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
                                        <a><p class="sport_text"><span class="sport_text_span">ОПРОС</span></p></a>
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
        @yield('footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/9aed91e10e.js"></script>
</body>
</html>
