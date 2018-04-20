<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ url('/') }}" />
        
        <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
        
        <link href="{{URL::asset('/css/app.css')}}" media="all" rel="stylesheet" />
        <link href="{{URL::asset('/assets/admin/css/users/edit.css')}}" media="all" rel="stylesheet" />
        <link href="{{URL::asset('/assets/admin/css/admin.css')}}" media="all" rel="stylesheet" />
         <link href="{{URL::asset('/assets/admin/css/dashboard.css')}}" media="all" rel="stylesheet" />

        <!-- Custom Theme Style -->
        <link href="{{URL::asset('/css/admin/custom.css')}}" rel="stylesheet">
    </head>
    <body class="nav-md">
        <div id="app" class="container body" data-lang="{{ isset($lang)? $lang : '' }}">
            <div class="main_container">
                @section('sidebar')
                    <div class="col-md-3 left_col">
                        <div class="left_col scroll-view">
                            <div class="navbar nav_title" style="border: 0;">
                              <a href="{{URL::to('/admin/dashboard/')}}" class="site_title"><i class="fa fa-gears"></i> <span>CMS v2</span></a>
                            </div>

                            <div class="clearfix"></div>

                            <!-- menu profile quick info -->
                            <div class="profile">
                                {{--<div class="profile_pic">--}}
                                    {{--<img src="{{URL::asset('/images/admin/img.jpg')}}" alt="..." class="img-circle profile_img">--}}
                                {{--</div>--}}
                                <div class="profile_info">
                                    <span>Welcome,</span>
                                    <h2>{{{isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email}}}</h2>
                                </div>
                            </div>
                            <!-- /menu profile quick info -->

                            <br />
                            <div class="clearfix"></div>

                            <!-- sidebar menu -->
                            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                                <div class="menu_section">
                                    <ul class="nav side-menu">
                                        {{--<li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>--}}
                                            {{--<ul class="nav child_menu">--}}
                                                {{--<li><a href="index.html">Dashboard</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                        <li class="{{(strpos(Request::segment(2), 'structure') !== false) ? 'active' : '' }}"><a><i class="fa fa-sitemap"></i>Structure <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu" style="{{(strpos(Request::segment(2), 'structure') !== false) ? 'display:block;' : '' }}">
                                                <li class="{{(strpos(Request::segment(2), 'sections') !== false) ? 'current-page' : '' }}"><a href="{{url('/admin/structure-sections/')}}">Sections</a></li>
                                            </ul>
                                        </li>
                                        <li class="{{(strpos(Request::segment(2), 'content') !== false) ? 'active' : '' }}"><a><i class="fa fa-newspaper-o"></i>Content <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu" style="{{(strpos(Request::segment(2), 'content') !== false) ? 'display:block;' : '' }}">
                                                <li class="{{(strpos(Request::segment(2), 'news_ru') !== false) ? 'current-page' : '' }}"><a href="{{url('/admin/content-news/ru/')}}">News RU</a></li>
                                                <li class="{{(strpos(Request::segment(2), 'news_az') !== false) ? 'current-page' : '' }}"><a href="{{url('/admin/content-news/az/')}}">News AZ</a></li>
                                                <li class="{{(strpos(Request::segment(2), 'photogallery') !== false) ? 'current-page' : '' }}"><a href="{{url('/admin/content-photogallery/')}}">Photogallery</a></li>

                                            </ul>
                                        </li>
                                        @if(Auth::user()->group_id == 1)
                                        <li class="{{(strpos(Request::segment(2), 'system') !== false) ? 'active' : '' }}"><a><i class="fa fa-gear"></i>System <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu" style="{{(strpos(Request::segment(2), 'system') !== false) ? 'display:block;' : '' }}">
                                                <li class="{{(strpos(Request::segment(2), 'system') !== false) ? 'current-page' : '' }}"><a href="{{url('/admin/system-users/')}}">Users</a></li>
                                            </ul>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!-- /sidebar menu -->

                            <!-- /menu footer buttons -->
                            <div class="sidebar-footer hidden-small">
                                <a data-toggle="tooltip" data-placement="top" title="Settings">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="Lock">
                                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="Logout">
                                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                </a>
                            </div>
                            <!-- /menu footer buttons -->
                        </div>
                    </div>
                @show
                
                @section('top_navigation')
                    <div class="top_nav">
                        <div class="nav_menu">
                            <nav>
                                <div class="nav toggle">
                                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                                </div>


                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        {{--<img src="{{URL::asset('/images/admin/img.jpg')}}" alt="">--}}
                                                        {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
                                                    </a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a class="pull-right" href="{{url('/logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i></a>
                                                </div>
                                            </div>
                                        </div>


                                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                                            <li><a href="javascript:;"> Profile</a></li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="badge bg-red pull-right">50%</span>
                                                    <span>Settings</span>
                                                </a>
                                            </li>
                                            <li><a href="javascript:;">Help</a></li>
                                            <li><a href="{{url('/logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </nav>
                        </div>
                    </div>
                @show
                
                @yield('content')
                
                @include('admin.layouts.footer')
            </div>
        </div>

        <!-- Custom Theme Scripts -->
        <script src="{!! mix('js/app.js') !!}"></script>
        <script src="{{ URL::asset('assets/admin/js/dashboard.js') }}"></script>
        <script src="{{ URL::asset('assets/admin/js/admin.js') }}"></script>
        <script src="{{ URL::asset('assets/admin/js/users/edit.js') }}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
        <script src="//cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>
        <script src="{{ URL::asset('js/admin/scripts.js') }}"></script>
        {{--<script src="{{ URL::asset('js/admin/custom.min.js') }}"></script>--}}

        <!-- Fontawesome -->
        <script src="https://use.fontawesome.com/a45b354850.js"></script>
        
        <!-- HTML5 Polifiller -->
        <script>
            (function() {

              var loadScript = function(src, loadCallback) {
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.src = src;
                s.onload = loadCallback;
                document.body.appendChild(s);
              };

              var isSafari = navigator.userAgent.indexOf("Safari") > -1;;
              var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
              if (isSafari || isOpera) {
                  loadScript('//cdnjs.cloudflare.com/ajax/libs/webshim/1.16.0/minified/polyfiller.js', function () {
                    webshims.setOptions('forms', {
                      overrideMessages: true,
                      replaceValidationUI: false
                    });
                    webshims.setOptions({
                      waitReady: true
                    });
                    webshims.polyfill();
                  });
                }
            })();
        </script>
    </body>
</html>