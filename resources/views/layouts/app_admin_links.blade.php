<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- css styles -->
    <link rel="stylesheet" href="{{ URL::asset('css\app_admin_view.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])



</head>

<body>
    <!-- Top navigation-->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid text-end">
            <a href="#"
            class="nav-link d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle me-2">
        </a>
        {{-- </a> --}}
        <ul class="dropdown-menu dropdown-menu-start ms-2">
            <li><a class="dropdown-item" href="#">Actionasfd fasdf</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something easdf aslse here</a></li>
        </ul>
        </div>
    </nav>







                <main>
                    @yield('content')
                </main>





        <footer>
            @yield('footer')
        </footer>


</body>
<script type="text/javascript" src="{{ URL::asset('js/app_project.js') }}"></script>

</html>
