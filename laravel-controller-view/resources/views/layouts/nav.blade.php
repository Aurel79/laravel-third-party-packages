@php
    $currentRouteName = Route::currentRouteName();
@endphp
<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand mb-0 h1">
            <i class="bi-hexagon-fill me-2"></i> Data Master
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('employees.index') }}" class="nav-link {{ Route::currentRouteName() == 'employees.index' ? 'active' : '' }}">Employee List</a>
                </li>
            </ul>
            <a href="{{ route('profile') }}" class="btn btn-outline-light">
                <i class="bi-person-circle"></i> My Profile
            </a>
        </div>
    </div>
</nav>

