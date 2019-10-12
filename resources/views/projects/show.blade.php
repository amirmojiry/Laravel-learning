@extends('layout')

@section('content')
    <h1 class="title">
        {{ $project -> title }}
    </h1>
    <div class="content">
        {{ $project->description }}
    </div>
    <ul>
        <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
    </ul>
    @if ($project->tasks->count())
        <div>
            @foreach ($project->tasks as $task)
                <div>
                    <form action="/tasks/ {{ $task->id }}" method="POST">
                        @method('PATCH')
                        <label for="completed" class="checkbox">
                            <input type="checkbox" name="completed">
                            {{ $task->description }}
                        </label>
                    </form>  
                </div>
            @endforeach
        </div>
    @endif
    <a href="/projects">Return</a>
@endsection