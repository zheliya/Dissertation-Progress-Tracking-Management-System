@extends('layouts.app_supervisor')

@section('content')

<div class="container text-center">
    @if ($project_query)
        {{ $project_query->title }}
    @else
        Project query not found.
    @endif
</div>

@endsection
