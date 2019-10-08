@extends('layout')

@section('content')
    <h1 class="title">
        {{ $project -> title }}
    </h1>
    <div class="content">
        {{ $project->description }}
    </div>
    <ul>
        <li><a href="/projects">Return</a></li>
        <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
    </ul>

@endsection