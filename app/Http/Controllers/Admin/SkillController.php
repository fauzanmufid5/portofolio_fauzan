<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        return view('admin.skills.index', [
            'skills' => Skill::orderBy('category')->orderByDesc('level')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.skills.form', ['skill' => new Skill()]);
    }

    public function store(Request $request)
    {
        Skill::create($this->validated($request));

        return redirect()->route('admin.skills.index')->with('success', 'Skill ditambahkan.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.form', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $skill->update($this->validated($request));

        return redirect()->route('admin.skills.index')->with('success', 'Skill diperbarui.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')->with('success', 'Skill dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|in:frontend,backend,tools',
            'level' => 'required|integer|min:0|max:100',
        ]);
    }
}
