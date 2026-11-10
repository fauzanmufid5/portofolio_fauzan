<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        return view('admin.educations.index', [
            'educations' => Education::orderBy('sort_order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.educations.form', ['education' => new Education()]);
    }

    public function store(Request $request)
    {
        Education::create($this->validated($request));

        return redirect()->route('admin.educations.index')->with('success', 'Pendidikan ditambahkan.');
    }

    public function edit(Education $education)
    {
        return view('admin.educations.form', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $education->update($this->validated($request));

        return redirect()->route('admin.educations.index')->with('success', 'Pendidikan diperbarui.');
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->route('admin.educations.index')->with('success', 'Pendidikan dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'school' => 'required|string|max:150',
            'degree' => 'required|string|max:150',
            'year_start' => 'required|digits:4|integer|min:1980|max:2100',
            'year_end' => 'nullable|digits:4|integer|min:1980|max:2100',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
        ]) + ['sort_order' => $request->input('sort_order', 0)];
    }
}
