@extends('layouts.admin')

@section('title', ($experience->exists ? 'Edit' : 'Tambah') . ' Experience')

@section('content')
<h1 class="font-display font-bold text-3xl">{{ $experience->exists ? 'Edit' : 'Tambah' }} Experience</h1>
<form method="POST" action="{{ $experience->exists ? route('admin.experiences.update', $experience) : route('admin.experiences.store') }}" class="rounded-2xl border border-white/10 bg-zinc-900/60 p-6 mt-6 space-y-5 max-w-2xl">
    @csrf @if($experience->exists) @method('PUT') @endif
    <div class="grid md:grid-cols-2 gap-5">
        <div>
            <label class="text-sm text-zinc-400">Perusahaan / Organisasi *</label>
            <input name="company" value="{{ old('company', $experience->company) }}" required maxlength="150" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <div>
            <label class="text-sm text-zinc-400">Posisi *</label>
            <input name="position" value="{{ old('position', $experience->position) }}" required maxlength="150" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <div>
            <label class="text-sm text-zinc-400">Tanggal mulai *</label>
            <input name="start_date" type="date" value="{{ old('start_date', $experience->start_date?->format('Y-m-d')) }}" required class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70 [color-scheme:dark]">
        </div>
        <div>
            <label class="text-sm text-zinc-400">Tanggal selesai (kosongkan jika masih berjalan)</label>
            <input name="end_date" type="date" value="{{ old('end_date', $experience->end_date?->format('Y-m-d')) }}" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70 [color-scheme:dark]">
        </div>
    </div>
    <div>
        <label class="text-sm text-zinc-400">Deskripsi</label>
        <textarea name="description" rows="4" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">{{ old('description', $experience->description) }}</textarea>
    </div>
    <div>
        <label class="text-sm text-zinc-400">Urutan</label>
        <input name="sort_order" type="number" min="0" value="{{ old('sort_order', $experience->sort_order ?? 0) }}" class="mt-1.5 w-32 rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
    </div>
    <div class="flex gap-3">
        <button class="px-6 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 text-sm font-semibold transition">Simpan</button>
        <a href="{{ route('admin.experiences.index') }}" class="px-6 py-2.5 rounded-xl border border-white/15 text-sm">Batal</a>
    </div>
</form>
@endsection
