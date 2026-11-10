<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        return view('admin.experiences.index', [
            'experiences' => Experience::orderBy('sort_order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.experiences.form', ['experience' => new Experience()]);
    }

    public function store(Request $request)
    {
        Experience::create($this->validated($request));

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman ditambahkan.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.form', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $experience->update($this->validated($request));

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman diperbarui.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'company' => 'required|string|max:150',
            'position' => 'required|string|max:150',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
        ]) + ['sort_order' => $request->input('sort_order', 0)];
    }
}
