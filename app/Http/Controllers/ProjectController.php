<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $techs = Project::pluck('tech_stack')->flatten()->unique()->filter()->sort()->values();

        return view('public.projects.index', [
            'profile' => Profile::first(),
            'projects' => Project::orderBy('sort_order')->orderByDesc('created_at')->get(),
            'techs' => $techs,
        ]);
    }

    public function show(Project $project)
    {
        $related = Project::where('id', '!=', $project->id)
            ->orderBy('sort_order')->take(3)->get();

        return view('public.projects.show', [
            'profile' => Profile::first(),
            'project' => $project,
            'related' => $related,
        ]);
    }
}
