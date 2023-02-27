<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('welcome.pageTitle') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/suc-logo.png" alt="" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link fw-bold text-white" href="{{ route('register') }}">Register an account</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <!-- hero -->
            <header>
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-xl-12">
                            <img src="/images/suc-bg.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="row mt-4 mb-3">
                        <div class="col-md-12 text-center mb-2">
                            <h1 class="fw-bold"><span class="text-primary">{{ __('welcome.schoolName') }}</span> {{ __('welcome.systemName') }}</h1>
                            <p class="lead">{{ __('welcome.description1') }}</p>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3 text-center">
                        <div class="col-md-12">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">{{ __('welcome.applyButton') }}</a>
                        </div>
                    </div>
                </div>
            </header>
            <!-- end hero -->

            <br>

            <!-- info for International applicant -->
            <div class="container-fluid bg-primary text-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center px-4 py-4">
                            <p class="lead px-0 py-0 mt-0 my-0">{{ __('welcome.description2') }}</p>
                            <p class="lead px-0 py-0 mt-0 my-0">{{ __('welcome.description3') }}</p>
                            <a href="{{ __('welcome.descriptionlink') }}" class="lead px-0 py-0 mt-0 my-0 text-white">{{ __('welcome.descriptionlink') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end info for International applicant -->
            <br>

            <!-- how it works -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="fw-bold text-center">{{ __('welcome.description4') }}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12 text-center">
                        <img src="/images/sign-in.png" alt="" class="img-fluid">
                        <h5 class="fw-bold">{{ __('welcome.step1') }}</h5>
                        <p>{{ __('welcome.step1Description') }}</p>
                    </div>
                    <div class="col-md-4 col-sm-12 text-center">
                        <img src="/images/user-profile.png" alt="" class="img-fluid">
                        <h5 class="fw-bold">{{ __('welcome.step2') }}</h5>
                        <p>{{ __('welcome.step2Description') }}</p>
                    </div>
                    <div class="col-md-4 col-sm-12 text-center">
                        <img src="/images/select-programme.png" alt="" class="img-fluid">
                        <h5 class="fw-bold">{{ __('welcome.step3') }}</h5>
                        <p>{{ __('welcome.step3Description') }}</p>
                    </div>
                </div>
            </div>
            <!-- end how it works -->
        </main>

        <br>
        <!-- footer -->
        <footer>
            <div class="container-fluid bg-primary text-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center mt-3 mb-3">
                            <span>{{ __('welcome.copyright') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->

    </div>
</body>
</html>