<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::orderBy('sort_order')->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.projects.form', ['project' => new Project()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $data['slug'] = Str::slug($data['title']).'-'.Str::lower(Str::random(5));

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project ditambahkan.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $this->validated($request, $project->id);

        if ($request->hasFile('image')) {
            if ($project->image && ! str_starts_with($project->image, 'http')) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        if (Str::slug($data['title']) !== Str::slug($project->title)) {
            $data['slug'] = Str::slug($data['title']).'-'.Str::lower(Str::random(5));
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project diperbarui.');
    }

    public function destroy(Project $project)
    {
        if ($project->image && ! str_starts_with($project->image, 'http')) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'short_desc' => 'required|string|max:255',
            'description' => 'required|string',
            'tech_input' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'github_url' => 'nullable|url|max:255',
            'demo_url' => 'nullable|url|max:255',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data['tech_stack'] = collect(explode(',', $data['tech_input'] ?? ''))
            ->map(fn ($t) => trim($t))->filter()->values()->all();
        $data['is_featured'] = $request->boolean('is_featured');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        unset($data['tech_input']);

        if (empty($data['image'] ?? null)) {
            unset($data['image']);
        }

        return $data;
    }
}
