<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">

    <!-- Search Engine -->
    <meta name="description" content="Join laravel related events around the world!">
    <meta name="image" content="https://laravents.com/logo_cube.png">
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="laravents.com">
    <meta itemprop="description" content="Join laravel related events around the world!">
    <meta itemprop="image" content="https://laravents.com/logo_cube.png">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="laravents.com">
    <meta name="twitter:description" content="Join laravel related events around the world!">
    <meta name="twitter:site" content="@laraventscom">
    <meta name="twitter:creator" content="@fwartner">
    <meta name="twitter:image" content="https://laravents.com/card.png">
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta property="og:title" content="laravents.com">
    <meta property="og:description" content="Join laravel related events around the world!">
    <meta property="og:image" content="https://laravents.com/card.png">
    <meta property="og:url" content="https://laravents.com">
    <meta property="og:site_name" content="laravents.com">
    <meta property="og:locale" content="en_US">
    <meta property="fb:admins" content="100003277138314">
    <meta property="og:type" content="website">

    <link rel="canonical" href="@yield('canonical', request()->url())" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') - {{ config('app.name') }}</title>
    @include('feed::links')

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Prefetch -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://use.fontawesome.com/">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    @stack('header_scripts')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @stack('header_styles')

    <script>
        window.Laravents = <?php echo json_encode(array_merge(
            App\Configuration\Laravents::scriptVariables(), []
        )); ?>;
    </script>
</head>
<body>
    <div id="app" class="page">
        @if(request()->path() == 'login')
            <div class="page-single">
                @yield('content')
            </div>
        @elseif(request()->path() == 'register')
            <div class="page-single">
                @yield('content')
            </div>
        @elseif(request()->path() == 'password/reset')
            <div class="page-single">
                @yield('content')
            </div>
        @else
            <div class="page-main">
                @include('_includes.navigation')

                @include('alert::bootstrap')

                @yield('content')

                @include('_includes.footer')
            </div>
        @endif
    </div>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116906314-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-116906314-2');
    </script>

    <script>
        var gaProperty = 'UA-116906314-2';
        var disableStr = 'ga-disable-' + gaProperty; if (document.cookie.indexOf(disableStr + '=true') > -1) {
            window[disableStr] = true;
        }

        function gaOptout() {
            document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/'; window[disableStr] = true; alert('Das Tracking durch Google Analytics wurde in Ihrem Browser für diese Website deaktiviert.');
        }
    </script>

    @guest
        <script>
            var botmanWidget = {
                frameEndpoint: 'https://larvis.laravents.com/botman/widget',
                chatServer: 'https://larvis.laravents.com/botman',
                mainColor: '#ffffff',
                bubbleBackground: '#ffffff',
                title: 'Larvis',
                bubbleAvatarUrl: 'https://larvis.laravents.com/robot.png',
                desktopHeight: 600,
                introMessage: 'Welcome to laravents.com! 👋 <br><br> I´m Larvis. Your personal 🤖 when it comes to any laravel related events on the 🌍. <br><br> Here´s a 📝 with commands, i understand: <br><br> - Show me conferences <br> - Show me meetups <br> - Show me hackathons',
                placeholderText: 'Ask me about any events for laravel..',
                aboutLink: 'https://github.com/laravents/larvis'
            };
        </script>
    @else
        <script>
            var botmanWidget = {
                frameEndpoint: 'https://larvis.laravents.com/botman/widget',
                chatServer: 'https://larvis.laravents.com/botman',
                mainColor: '#ffffff',
                bubbleBackground: '#ffffff',
                title: 'Larvis',
                bubbleAvatarUrl: 'https://larvis.laravents.com/robot.png',
                desktopHeight: 600,
                introMessage: 'Hello, {!! Auth::user()->name !!}! 👋 <br><br> I´m Larvis. Your personal 🤖 when it comes to any laravel related events on the 🌍. <br><br> Here´s a 📝 with commands, i understand: <br><br> - Show me conferences <br> - Show me meetups <br> - Show me hackathons',
                placeholderText: 'Ask me about any events for laravel..',
                aboutLink: 'https://github.com/laravents/larvis',
                userId: {!! Auth::user()->id !!}
            };
        </script>
    @endguest
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
    <script>
        window.addEventListener("load", function(){
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#000"
                    },
                    "button": {
                        "background": "#f1d600"
                    }
                },
                "position": "top",
                "static": true
            })});
    </script>
</body>
</html>
