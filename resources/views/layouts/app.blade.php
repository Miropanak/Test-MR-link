<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Databanka udalostí</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    @auth
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    @endauth

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Databanka udalostí (Beta 0.7.25)
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                           <!--  <li><a href="{{ route('login') }}">Prihlásenie</a></li>
                            <li><a href="{{ route('register') }}">Registrácia</a></li> -->
                        @else
                                <li>
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                            <li>
                                <a href="{{ route('activities/show') }}">Aktivity</a>
                            </li>
                            <li>
                                <a href="{{ route('events/show') }}">Udalosti</a>
                            </li>
                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Pridať <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        @if ((Auth::user()->id_user_types > 2))
                                            <a href="{{ route('activities/new') }}">
                                                Aktivitu
                                            </a>
                                        @else
                                            <a href="" style="color:darkgray;cursor:not-allowed;opacity:0.5;text-decoration: none">
                                                Aktivitu
                                            </a>
                                         @endif
                                    </li>
                                    <li>
                                        @if ((Auth::user()->id_user_types > 2))
                                            <a href="{{ route('events/new') }}">
                                                Udalosť
                                            </a>
                                        @else
                                            <a href="" style="color:darkgray;cursor:not-allowed;opacity:0.5;text-decoration: none">
                                                Udalosť
                                            </a>
                                        @endif
                                    </li>
                                    <div class="dropdown-divider"></div>
                                        <li>
                                            <a href="{{ route('exam/create') }}">
                                                Merateľné testovanie
                                            </a>
                                        </li>
                                    <!-- <li>
                                        <a href="/units/new">
                                            Jednotku
                                        </a>
                                    </li> -->
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Testovanie <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('tests/show') }}">
                                            Informatívne
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('exam/show') }}">
                                            Merateľné
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Odhlásiť
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#select_users').select2({
                placeholder : 'Prosím vyberte účastníka',
                allowClear: 'true',
                width:'resolve',
            });
        });
    </script>

</body>
</html>
