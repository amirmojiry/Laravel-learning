<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

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

    public function show(Project $project)
    {
        return view ('projects.show', compact('project'));   
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        
        Project::create(request(['title', 'description']));

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
        $project->update(request(['title', 'description']));
        
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
