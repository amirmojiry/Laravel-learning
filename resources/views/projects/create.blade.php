@extends('layout')

@section('content')
    <h1 class="title">
        Create a new project
    </h1>
    <form method="POST" action="/projects" style="margin-bottom: 1em;">

        {{csrf_field()}}

        <div class="field">
            <label for="title" class="label">
                Title
            </label>
            <div class="control">
                <input type="text" class="input" name="title" placeholder="Project Title" required>
            </div>
        </div>
        <div class="field">
            <label for="description" class="label">
                Description
            </label>
            <div class="control">
                <textarea name="description" id="description" class="textarea" required></textarea>
            </div>
        </div>
        <div class="field">
            <button class="button is-link" type="submit">
                Create
            </button>
        </div>
        
    </form>
@endsection