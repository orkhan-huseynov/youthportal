<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
        
        <link href="{{URL::asset('/css/app.css')}}" media="all" rel="stylesheet" />
        <link href="{{URL::asset('/assets/admin/css/users/edit.css')}}" media="all" rel="stylesheet" />
        <link href="{{URL::asset('/assets/admin/css/admin.css')}}" media="all" rel="stylesheet" />
         <link href="{{URL::asset('/assets/admin/css/dashboard.css')}}" media="all" rel="stylesheet" />

        <!-- Custom Theme Style -->
        <link href="{{URL::asset('/css/admin/custom.css')}}" rel="stylesheet">
    </head>
    <body class="nav-md">
        <div id="app" class="container body">
            <div class="main_container">

                @yield('content')

            </div>
        </div>

        <!-- Custom Theme Scripts -->
        <script src="{!! mix('js/app.js') !!}"></script>
        <script src="{{ URL::asset('assets/admin/js/dashboard.js') }}"></script>
        <script src="{{ URL::asset('assets/admin/js/admin.js') }}"></script>
        <script src="{{ URL::asset('assets/admin/js/users/edit.js') }}"></script>
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