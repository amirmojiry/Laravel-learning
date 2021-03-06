<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
//use App\Services\Twitter;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        //return $projects;
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view ('projects.create');
    }

    public function show(Project $project/*, Twitter $twitter*/)
    {
        //dd($twitter);

        return view ('projects.show', compact('project'));   
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:5']
        ]);
        
        Project::create($attributes);

        //Project::create(request(['title', 'description']));

        //return request()->all();

        // $project = new Project();
        // $project->title = request ('title');
        // $project->description = request ('description');
        // $project ->save();

        return redirect ('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:5']
        ]);
        $project->update($attributes);
        
        // $project->title = request ('title');
        // $project->description = request ('description');
        // $project->save();
        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        //Project::findOrFail($id)->delete();
        $project->delete();
        return redirect ('/projects');
    }
}
