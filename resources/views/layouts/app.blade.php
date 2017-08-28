<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" minimal-ui>

    <meta name="description" content="@yield('meta-description', config('app.name') . '.se | Lediga jobb inom vård')" />
    <meta name="keywords" content="Lediga jobb, jobb, vård, extrajobb, deltidsjobb, heltid, jobba extra" />

    <meta property="fb:app_id" content="{{ env('FACEBOOK_APP_ID') }}" />
    <meta property="og:title" content="@yield('og-title', config('app.name') . '.se | Lediga jobb inom vård')" />
    <meta property="og:description" content="@yield('og-description', 'Här kan du söka bland tusentals jobb! Oavsett om du är nyutexaminerad eller helt enkelt vill vidare i karriären kan vi hjälpa dig att hitta rätt. Vi jobbar rikstäckande och hjälper allt i från enskilda firmor till stora koncerner, kommuner och myndigheter med att hitta rätt personal. ')" />

    {{--Använd om man vill ha företagets logga för annons (kan bli konstiga proportioner)--}}
    <meta property="og:image" content="@yield('og-image', asset('img/logo_og.png'))" />
    {{--<meta property="og:image" content={{ asset('img/logo_og.png') }} />--}}

    <meta property="og:url" content={{ URL::current() }} />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ asset('apple-touch-icon-60x60.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset('apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ asset('apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-196x196.png') }}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-128.png') }}" sizes="128x128" />
    <meta name="application-name" content="{{ env('APP_NAME', 'Vårdvakanser') }}"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ asset('mstile-144x144.png') }}" />
    <meta name="msapplication-square70x70logo" content="{{ asset('mstile-70x70.png') }}" />
    <meta name="msapplication-square150x150logo" content="{{ asset('mstile-150x150.png') }}" />
    <meta name="msapplication-wide310x150logo" content="{{ asset('stile-310x150.png') }}" />
    <meta name="msapplication-square310x310logo" content="{{ asset('stile-310x310.png') }}" />


    <title>@yield('title', config('app.name', 'Vårdvakanser'))</title>

    <!-- Styles -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">--}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-83188287-3', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body>
<nav class="navbar navbar-custom navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img alt="{{ config('app.name', 'Vårdvakanser') }}" src="{{ asset("img/logo_navbar.png") }}">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ URL::action('SearchController@index') }}">
                        Leta jobb
                    </a>
                </li>
                <li>
                    <a href="{{ URL::action('CompanyController@index') }}">
                        Hitta arbetskraft
                    </a>
                </li>
                <li>
                    <a href="{{ URL::action('FeaturedController@index') }}">
                        Attraktiva arbetsgivare
                    </a>
                </li>
                <li class="visible-xs">
                    <a href="{{ URL::action('AboutController@index') }}">
                        Om oss
                    </a>
                </li>
                <li class="visible-xs">
                    <a href="{{ URL::action('ContactController@create') }}">Kontakt</a>
                </li>
                <li class="dropdown hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Om oss <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ URL::action('AboutController@index') }}">
                                Om oss
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::action('ContactController@create') }}">Kontakt</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    {{--<li><a href="{{ url('/login') }}">Logga in</a></li>--}}
                    <li><a href="{{ url('/register') }}">Registrera</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logga ut
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@if (isset($afApiError))
    <div class="alert alert-custom alert-top">
        <p>
            <strong>Ajdå!</strong>
            Just nu verkar vi ha lite problem med vår sökfunktion. Prova igen om ett litet tag!
        </p>
        <div class="hidden">
            <ul>
                @foreach($afApiError as $key => $value)
                    <li>{{ $key }} : {{ $value }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(Session::has('message'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12 m-t-2">
            <div class="alert alert-success">
                {!! Session::get('message') !!}
            </div>
        </div>
    </div>
@endif

@yield('content')

@include('pages.partials.footer')

<!-- Scripts -->
<script src="{{ elixir('js/app.js') }}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.min.js"></script>--}}
{{--<script src="{{ asset('js/summernote/lang/summernote-sv-SE.js') }}"></script>--}}

<script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1281583025251547'); // Insert your pixel ID here.
    fbq('track', 'PageView');
</script>

<noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1281583025251547&ev=PageView&noscript=1"/>
</noscript>

</body>
</html>
