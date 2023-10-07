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
    <link rel="stylesheet" href="{{ URL::asset('css\app.css') }}">
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
                        <a href="{{ url('/ProjectQuery/' . $projects->id) }}"
                            class="nav-link d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                class="rounded-circle me-2">
                            <strong>{{ $current_student->full_name }}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start">
                            @foreach ($SubProjects as $SubProject)
                                @foreach ($SubStudents as $SubStudent)
                                    @if ($SubStudent->id === $SubProject->student_id)
                                        <li class="align-self-center">
                                            <a href="{{ url('/ProjectQuery/' . $SubProject->id) }}"
                                                class="align-self-center dropdown-item d-flex align-items-center link-dark text-decoration-none">
                                                <div>
                                                    <div class="col">
                                                        <img src="https://github.com/mdo.png" alt=""
                                                            width="32" height="32" class="rounded-circle me-2">
                                                        <strong>{{ $SubStudent->full_name }}</strong>
                                                    </div>
                                                    <div class="col ps-5">
                                                        <p>{{ $SubProject->title }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </li>
                    <form id="SubmitEdidtTitleCheckbox" method="POST"
                        action="{{ route('updatecheckbox', ['project_id' => $projects->id]) }} ">
                        @csrf
                        <li class="nav-item confirmation-title">
                            <label>
                                <input class="form-check-input mb-3" type="checkbox" name="confirm_title"
                                    id="confirm_title" {{ $projects->confirm_title ? 'checked' : '' }}>
                                Enable editing
                            </label>
                        </li>
                        <li class="nav-item title">
                            @if ($projects->confirm_title)
                                <input id="editableTitle" class="title-input " type="text" name="title"
                                    value="{{ $projects->title }}">
                                <br>
                                <input id="editableSubTitle" class="sub-title-input " type="text" name="subtittle"
                                    value="{{ $projects->subtittle }}">
                            @else
                                <input id="editableTitle" class="title-input d-none" type="text" name="title"
                                value="{{ $projects->title }}">
                                <br>
                                <input id="editableSubTitle" class="sub-title-input d-none" type="text" name="subtittle"
                                value="{{ $projects->subtittle }}">
                                    <div class="title-input-text "> {{ $projects->title }}</div>
                                    <div class="title-input-text-input "> {{ $projects->subtittle }}</div>
                            @endif
                            <button type="submit" class="btn btn-primary " id="checkboxSubmitButton">Save</button>
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
                            <strong>{{ $supervisor->full_name }}</strong>
                        </a>
                        {{-- </a> --}}
                        <ul class="dropdown-menu dropdown-menu-end ">
                            <li>
                                <a class="dropdown-item" href="{{ url('/GetAllProject') }}">
                                    view projects
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="progress main-progress-bar " role="progressbarS" aria-label="Example with label" aria-valuenow="70"
        aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar main-progress-bar-scale" style="width: {{ $projects->project_status }}%">
            <value class="main-progress-bar-value">{{ $projects->project_status }}%</value>
        </div>
    </div>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-0 side-navbar" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <div class="list-group-item list-group-item-action " href="#!">
                    <a href="{{ url('/ProjectQuery/' . $projects->id) }}"
                        class="text-decoration-none">
                        <button
                            class="chapter-background accordion__question {{ request()->is('ViewProjectorsupervisor') || request()->is('ProjectQuery/*') ? 'open' : '' }}">{{ $project_query->title }}</button>
                    </a>
                </div>
                @foreach ($projects->chapters()->orderBy('deadline')->get() as $chapter)
                    <div class="list-group-item list-group-item-action" href="#!">
                        <a href="{{ url('/Project/' . $projects->id . '/Chapter/' . $chapter->id) }}"
                            class="text-decoration-none">
                            <button
                                class="chapter-background accordion__question text-start {{ request()->is('Project/' . $projects->id . '/Chapter/' . $chapter->id ) || request()->is('Project/' . $projects->id . '/Chapter/' . $chapter->id . '/Task/*') ? 'open' : '' }}">
                                {{ $chapter->title }}
                            </button>
                        </a>
                        <div
                            class="accordion__collapse {{ request()->is('Project/' . $projects->id . '/Chapter/' . $chapter->id ) || request()->is('Project/' . $projects->id . '/Chapter/' . $chapter->id . '/Task/*') ? 'collapsing' : 'collapse' }}">
                            <div class="accordion__content">
                                @foreach ($chapter->tasks()->orderBy('deadline')->get() as $task)
                                    <a href="{{ url('/Project/' . $projects->id . '/Chapter/' . $chapter->id . '/Task/' . $task->id) }}"
                                        class="text-decoration-none">
                                        <div class="task task-start {{ request()->is('Project/' . $projects->id . '/Chapter/' . $chapter->id . '/Task/' . $task->id ) ? 'active' : '' }}">
                                            <i class="{{ request()->is('Project/' . $projects->id . '/Chapter/' . $chapter->id . '/Task/' . $task->id) ? 'active' : '' }} bi-caret-down-fill task-icon"></i>
                                            {{ $task->title }}
                                        </div>
                                    </a>
                                @endforeach
                                <a href="#" class="text-decoration-none">
                                    <div class="add-task" data-bs-target="#exampleModalToggle"
                                        data-bs-toggle="modal">
                                        <i class="bi bi-caret-down-fill add-task-icon"></i><i
                                            class="bi bi-plus-lg"></i>
                                    </div>
                                </a>
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
                    @yield('content')
                </main>

            </div>
        </div>
    </div>
    @if (request()->is('Project/*/Chapter/*') || request()->is('Project/*/Chapter/*/Task/*'))
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content add-task-model">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Create Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('addtask', ['chapter_id' => $chapter->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Task Name input -->
                        <label class="form-label" for="task-name">Task Name</label>
                        <input name="title" class="form-control" type="text" placeholder="Task Name" required>
                        <!-- Template file input -->
                        <label for="template-file" class="form-label">Template</label>
                        <input name="template_file" class="form-control" type="file" id="template-file">
                        <!-- Guideline file input -->
                        <label for="guideline-file" class="form-label">Guideline</label>
                        <input name="guideline_file" class="form-control" type="file" id="guideline-file">
                        <!-- Deadline input -->
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="datetime-local" name="deadline" class="form-control" required>
                        <!-- Submit and Cancel buttons -->
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    @endif
    <footer>
        @yield('footer')

        <a href="{{ route('download-zip', ['project_id' => $projects->id]) }}">Download All Chapters</a>

    </footer>
</body>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>

</html>
