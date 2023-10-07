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
    <link rel="stylesheet" href="{{ URL::asset('css\app_admin.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


</head>

<body>
    <!-- Top navigation-->
    <nav class="navbar navbar-expand-md bg-body-tertiary ">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown   supervisor-profile">
                        {{-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> --}}
                        <a href="#"
                            class="nav-link d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                class="rounded-circle me-2">
                        </a>
                        {{-- </a> --}}
                        <ul class="dropdown-menu dropdown-menu-end ">
                            <li><a class="dropdown-item" href="#">Actionasfd fasdf</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something easdf aslse here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-0 side-navbar" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                @foreach ($departments as $department)
                    <div class="list-group-item list-group-item-action " href="#!">
                        <a href="{{ url('/department/' . $department->id) }}" class="text-decoration-none">
                            <button class="text-start chapter-background accordion__question {{ request()->is('department/' . $department->id) ? 'open' : '' }}">{{ $department->name }}</button>
                        </a>
                    </div>
                @endforeach
                <div class="list-group-item list-group-item-action" data-bs-target="#exampleModalToggle"
                    data-bs-toggle="modal">
                    <a href="#" class="text-decoration-none">
                        <button class=" add_department chapter-background">add department</button>
                    </a>
                </div>
            </div>
        </div>


        <div class="modal fade " id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content add-task-model">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Add a New Department</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action=" {{ route('add_department') }} " enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="department_name">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>



        <!-- Page content wrapper-->
        <div id="page-content-wrapper">

            <div class="container-fluied">

                <!-- Main Wrapper -->
                <button class="mt-1 sidebarbtn" id="sidebarToggle"><i
                    class="sidebar_icon bi bi-caret-right-fill"></i></button>
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>




    <footer>
        @yield('footer')
    </footer>


</body>
<script type="text/javascript" src="{{ URL::asset('js/app_admin.js') }}"></script>

</html>
