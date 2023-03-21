<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/a3b7cabc02.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a href="/"><img src="{{ asset('images/logo-sam-basket.png') }}" alt="Logo SAM Basket 79"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

                    <div class="mx-auto navbar-nav">

                        <!-- liens pour les non connectés -->
                        @guest
                            @if (Route::has('login'))
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            @endif
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                            @endif

                            <!-- liens pour les connectés -->
                        @else
                            <span class="mt-2 me-4 fw-bold">Bonjour {{ Auth::user()->prenom }}</span>
                            <a class="nav-link" href="{{ route('users.edit', $user = Auth::user()) }}">Compte client</a>
                            @if (Auth::user()->isAdmin())
                                <a class="nav-link" href="{{ route('admin.index') }}">Page administrateur</a>
                            @endif
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Déconnexion') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @endguest

                        <!-- liens pour tous -->

                        <a class="nav-link" href="{{ route('panier', $user = Auth::user()) }}"><i
                            class="fa-solid fa-cart-shopping fa-2x"></i></a>
                    </div>


















            </div>
    </div>
    </nav>



    <div class="container w-50 text-center p-3">

        @if (session()->has('message'))
            <p class="alert alert-success">{{ session()->get('message') }}</p>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

    <main class="py-4">
        @yield('content')
    </main>
    </div>

    <section id="footer">
        <div class="container-fluid bg-dark">
            <div class="row">
                <div style="color: white" class="col-md-12 text-center p-2">
                    <p><small>SAM BASKET 79 <i class="fa-regular fa-copyright"></i> 2023 (Tous droits réservés)
                            <br><a href="https://www.facebook.com/sambasket79/?locale=fr_FR" target="_blank"
                                class="fa-brands fa-square-facebook fa-2x p-2"></a>
                            <a href="https://www.instagram.com/samb79320/" target="_blank"
                                class="fa-brands fa-instagram fa-2x p-2"></a>
                        </small></p>
                </div>
            </div>
    </section>

    @php
        if (!session()->has('panier')) {
            session()->put('panier', []);
        }
    @endphp

</body>

</html>
