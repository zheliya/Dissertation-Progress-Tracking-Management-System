
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
    <link rel="stylesheet" href="{{ URL::asset('css\app_student.css') }}">

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
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown student-profile">
                        <a href="#"
                            class="nav-link d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                class="rounded-circle me-2">
                            <strong>{{ $student->full_name }}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start">
                            <li>
                                <a class="dropdown-item d-flex align-items-center link-dark text-decoration-none" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <strong>Logout</strong>
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </ul>
                    </li>
                    <form id="SubmitEdidtTitleCheckbox" method="POST"
                        action="{{ route('titleConfirmationstudent', ['project_id' => $project->id]) }} ">
                        @csrf

                        <li class="nav-item title">
                            @if($project->confirm_title)
                                <input id="editableTitle" class="title-input " type="text" name="title" value="{{ $project->title }}">
                                <br>
                                <input id="editableSubTitle" class="sub-title-input " type="text" name="subtittle" value="{{ $project->subtittle }}">
                                <button type="submit" class="btn btn-primary " id="checkboxSubmitButton">Save</button>
                            @else
                                <div class="title-input-text mt-3"> {{ $project->title }}</div>
                                <div class="ms-4 title-input-text-input "> {{ $project->subtittle }}</div>
                            @endif
                        </li>

                    </form>
                </ul>
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
                            <li><a class="dropdown-item" href="#">{{ $supervisor->email }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="progress main-progress-bar " role="progressbarS" aria-label="Example with label" aria-valuenow="70"
        aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar main-progress-bar-scale" style="width: {{ $project->project_status }}%">
            <value class="main-progress-bar-value">{{ $project->project_status }}%</value>
        </div>
    </div>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-0 side-navbar" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <div class="list-group-item list-group-item-action " href="#!">
                    <a href="{{ url('/Project/Query') }}"
                        class="text-decoration-none">
                        <button
                            class="chapter-background accordion__question {{ request()->is('Project/Query')  ? 'open' : '' }}">{{ $project_query->title }}</button>
                    </a>
                </div>
                @foreach ($project->chapters()->orderBy('deadline')->get() as $chapter)
                    <div class="list-group-item list-group-item-action" href="#!">
                        <a href="{{ url('/Project/' . $project->id . '/Chapter/' . $chapter->id .'/student') }}"
                            class="text-decoration-none">
                            <button
                                class="chapter-background accordion__question text-start
                                {{ request()->is('Project/' . $project->id . '/Chapter/' . $chapter->id .'/student') ||
                                request()->is('Project/' . $project->id . '/Chapter/' . $chapter->id . '/Task/*/student') ? 'open' : '' }}">
                                {{ $chapter->title }}
                            </button>
                        </a>
                        <div
                            class="accordion__collapse {{ request()->is('Project/' . $project->id . '/Chapter/' . $chapter->id.'/student' ) ||
                            request()->is('Project/' . $project->id . '/Chapter/' . $chapter->id . '/Task/*/student') ? 'collapsing' : 'collapse' }}">
                            <div class="accordion__content">
                                @foreach ($chapter->tasks()->orderBy('deadline')->get() as $task)
                                    <a href="{{ url('/Project/' . $project->id . '/Chapter/' . $chapter->id . '/Task/' . $task->id.'/student') }}"
                                        class="text-decoration-none">
                                        <div class="task task-start
                                        {{ request()->is('Project/' . $project->id . '/Chapter/' . $chapter->id . '/Task/' . $task->id .'/student') ? 'active' : '' }}">
                                            <i class="
                                            {{ request()->is('Project/' . $project->id . '/Chapter/' . $chapter->id . '/Task/' . $task->id.'/student') ? 'active' : '' }}
                                            bi-caret-down-fill task-icon"></i>
                                            {{ $task->title }}
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <div class="container-fluied">
                <!-- Main Wrapper -->
                <button class="mt-1 sidebarbtn" id="sidebarToggle"><i
                        class="sidebar_icon bi bi-caret-right-fill"></i></button>
                <main>
                    {{-- <h1>{{ $chapters->id }}</h1> --}}<!-- why is the id always 1? -->
                    @yield('content')
                </main>
            </div>
        </div>
    </div>


    <footer>
        @yield('footer')
    </footer>


</body>
<script type="text/javascript" src="{{ URL::asset('js/app_student.js') }}"></script>

</html>
