<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AppFit') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    body{
        font-size: 1.1rem;
    }
    .list-group-ejercicios{
        max-height: 500px;
        overflow-x: hidden;
        overflow-y: scroll;
    }
    </style>
</head>
<body class="mw-100" >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm font-weight-bold">
            <div class="container">
                <a class="navbar-brand" href="">
                    {{ config('app.name', 'AppFit') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto bg-light">
                        <!-- Authentication Links -->
                        

                        <div class="nav">
                        @auth
                        
                            <div class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Home</a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link" href="{{ route('entrenamientos.list')}}">Planes de entrenamiento</a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link" href="{{ route('ejercicios.list')}}">Ejercicios</a>
                            </div>
                            @if(Auth::user()->imagen != null)
                            <img src="/images/usuarios/{{ Auth::user()->imagen }}" style="width:40px; height: 40px; border-radius: 50%" alt="Imagen de" />
                            @else
                            <img src="/images/usuarios/default.png" style="width:40px; height: 40px; border-radius: 50%" alt="Imagen de" />
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('usuarios.editar', Auth::user()->id) }}">{{ __('Perfil') }}</a>
                                </div>

                            </li>
                        @endauth
                        </div>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
