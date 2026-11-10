@extends('layouts.admin')

@section('title', ($project->exists ? 'Edit' : 'Tambah') . ' Project')

@section('content')
<h1 class="font-display font-bold text-3xl">{{ $project->exists ? 'Edit' : 'Tambah' }} Project</h1>
<form method="POST" action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}" enctype="multipart/form-data" class="rounded-2xl border border-white/10 bg-zinc-900/60 p-6 mt-6 space-y-5 max-w-2xl">
    @csrf @if($project->exists) @method('PUT') @endif
    <div>
        <label class="text-sm text-zinc-400">Judul *</label>
        <input name="title" value="{{ old('title', $project->title) }}" required maxlength="150" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
    </div>
    <div>
        <label class="text-sm text-zinc-400">Deskripsi singkat * (maks 255)</label>
        <input name="short_desc" value="{{ old('short_desc', $project->short_desc) }}" required maxlength="255" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
    </div>
    <div>
        <label class="text-sm text-zinc-400">Deskripsi lengkap *</label>
        <textarea name="description" rows="5" required class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">{{ old('description', $project->description) }}</textarea>
    </div>
    <div>
        <label class="text-sm text-zinc-400">Tech stack (pisahkan koma: Laravel, MySQL)</label>
        <input name="tech_input" value="{{ old('tech_input', is_array($project->tech_stack) ? implode(', ', $project->tech_stack) : '') }}" maxlength="255" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
    </div>
    <div class="grid md:grid-cols-2 gap-5">
        <div>
            <label class="text-sm text-zinc-400">GitHub URL</label>
            <input name="github_url" type="url" value="{{ old('github_url', $project->github_url) }}" maxlength="255" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <div>
            <label class="text-sm text-zinc-400">Demo URL</label>
            <input name="demo_url" type="url" value="{{ old('demo_url', $project->demo_url) }}" maxlength="255" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
    </div>
    <div>
        <label class="text-sm text-zinc-400">Gambar (jpg/png, maks 2MB)</label>
        <input type="file" name="image" accept="image/*" class="mt-1.5 w-full text-sm text-zinc-400 file:mr-3 file:px-4 file:py-2 file:rounded-lg file:border-0 file:bg-white/10 file:text-white hover:file:bg-white/20">
        @if($project->image)<p class="text-xs text-zinc-500 mt-1">Saat ini: {{ Str::limit($project->image, 60) }}</p>@endif
    </div>
    <div class="grid md:grid-cols-2 gap-5">
        <div>
            <label class="text-sm text-zinc-400">Urutan</label>
            <input name="sort_order" type="number" min="0" value="{{ old('sort_order', $project->sort_order ?? 0) }}" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <label class="flex items-center gap-2 text-sm text-zinc-300 mt-7">
            <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $project->is_featured)) class="accent-emerald-500 w-4 h-4"> Featured
        </label>
    </div>
    <div class="flex gap-3">
        <button class="px-6 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 text-sm font-semibold transition">Simpan</button>
        <a href="{{ route('admin.projects.index') }}" class="px-6 py-2.5 rounded-xl border border-white/15 text-sm">Batal</a>
    </div>
</form>
@endsection
