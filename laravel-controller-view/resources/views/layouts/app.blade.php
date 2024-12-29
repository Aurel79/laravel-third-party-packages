<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @if (!request()->routeIs('login'))
            <nav class="navbar navbar-expand-md navbar-dark bg-primary">
                <div class="container">
                    <!-- Logo dan Nama Aplikasi -->
                    <a href="{{ route('home') }}" class="navbar-brand mb-0 h1">
                        <i class="bi-hexagon-fill me-2"></i> Data Master
                    </a>

                    <!-- Tombol untuk navbar toggle di layar kecil -->
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navbar Konten -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Kiri Navbar (Menu Utama) -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a href="{{ route('home') }}"
                                    class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('employees.index') }}"
                                    class="nav-link {{ Route::currentRouteName() == 'employees.index' ? 'active' : '' }}">
                                    Employee List
                                </a>
                            </li>
                        </ul>

                        <!-- Kanan Navbar (Profile dan Dropdown) -->
                        <ul class="navbar-nav ms-auto">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white"
                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <!-- Navbar Dropdown untuk User yang Terlogin -->
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        <i class="bi-person-circle"></i> {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <!-- My Profile -->
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <i class="bi bi-person-circle"></i>
                                            {{ __('My Profile') }}
                                        </a>
                                        <hr>
                                        <!-- Logout -->
                                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="bi bi-lock-fill" style="color: red;"></i>
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @vite('resources/js/app.js')
    @include('sweetalert::alert')
    @stack('scripts')
    @include('sweetalert::alert')
</body>

</html>
