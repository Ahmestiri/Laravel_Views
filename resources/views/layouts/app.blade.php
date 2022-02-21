<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SJE Members</title>
    <link rel="icon" href="/brand/icon.ico">
    <!-- JS -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm ">
            <div class="container">
                <!-- Brand Name -->
                <div id="brand" style="margin-left:100px">
                    <a  class="navbar-brand d-flex align-items-center" href="/">
                        <div class="pr-3" style="border-right:1px solid #333"><img src="/brand/logo.png" style="width:50px;"></div>
                        <div class="pl-3">SJE Members</div>
                    </a>
                </div>
                <!-- Collapsible Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Authentification Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Authentication Links -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            <!-- Login -->
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            <!-- Register -->
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                                <!-- Name & Logout -->
                                <li class="nav-item dropdown">
                                    <!-- Name -->
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                                    </a>
                                    <!-- Logout -->
                                    <div id = "logout" class="dropdown-menu dropdown-menu-end text-justify" aria-labelledby="navbarDropdown">
                                        <a id = "dropdown" class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        <hr style="margin:5px 0px;">
                                        <a id = "dropdown" class="dropdown-item" href="/">SJE Members</a>
                                    </div>
                                </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
