@extends('layouts.admin')

@section('title', ($skill->exists ? 'Edit' : 'Tambah') . ' Skill')

@section('content')
<h1 class="font-display font-bold text-3xl">{{ $skill->exists ? 'Edit' : 'Tambah' }} Skill</h1>
<form method="POST" action="{{ $skill->exists ? route('admin.skills.update', $skill) : route('admin.skills.store') }}" class="rounded-2xl border border-white/10 bg-zinc-900/60 p-6 mt-6 space-y-5 max-w-2xl">
    @csrf @if($skill->exists) @method('PUT') @endif
    <div>
        <label class="text-sm text-zinc-400">Nama skill *</label>
        <input name="name" value="{{ old('name', $skill->name) }}" required maxlength="100" placeholder="Contoh: Laravel" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
    </div>
    <div class="grid md:grid-cols-2 gap-5">
        <div>
            <label class="text-sm text-zinc-400">Kategori *</label>
            <select name="category" required class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
                @foreach(['frontend' => 'Frontend', 'backend' => 'Backend', 'tools' => 'Tools'] as $val => $label)
                    <option value="{{ $val }}" @selected(old('category', $skill->category ?? 'tools') === $val)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm text-zinc-400">Level (0–100) *</label>
            <input name="level" type="number" min="0" max="100" value="{{ old('level', $skill->level ?? 70) }}" required class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
    </div>
    <div class="flex gap-3">
        <button class="px-6 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 text-sm font-semibold transition">Simpan</button>
        <a href="{{ route('admin.skills.index') }}" class="px-6 py-2.5 rounded-xl border border-white/15 text-sm">Batal</a>
    </div>
</form>
@endsection
