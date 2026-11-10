@extends('layouts.admin')

@section('title', ($education->exists ? 'Edit' : 'Tambah') . ' Education')

@section('content')
<h1 class="font-display font-bold text-3xl">{{ $education->exists ? 'Edit' : 'Tambah' }} Education</h1>
<form method="POST" action="{{ $education->exists ? route('admin.educations.update', $education) : route('admin.educations.store') }}" class="rounded-2xl border border-white/10 bg-zinc-900/60 p-6 mt-6 space-y-5 max-w-2xl">
    @csrf @if($education->exists) @method('PUT') @endif
    <div class="grid md:grid-cols-2 gap-5">
        <div>
            <label class="text-sm text-zinc-400">Sekolah / Kampus *</label>
            <input name="school" value="{{ old('school', $education->school) }}" required maxlength="150" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <div>
            <label class="text-sm text-zinc-400">Gelar / Jurusan *</label>
            <input name="degree" value="{{ old('degree', $education->degree) }}" required maxlength="150" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <div>
            <label class="text-sm text-zinc-400">Tahun mulai * (cth: 2021)</label>
            <input name="year_start" value="{{ old('year_start', $education->year_start) }}" required pattern="\d{4}" maxlength="4" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <div>
            <label class="text-sm text-zinc-400">Tahun selesai (kosongkan jika masih berjalan)</label>
            <input name="year_end" value="{{ old('year_end', $education->year_end) }}" pattern="\d{4}" maxlength="4" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
    </div>
    <div>
        <label class="text-sm text-zinc-400">Deskripsi</label>
        <textarea name="description" rows="3" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">{{ old('description', $education->description) }}</textarea>
    </div>
    <div>
        <label class="text-sm text-zinc-400">Urutan</label>
        <input name="sort_order" type="number" min="0" value="{{ old('sort_order', $education->sort_order ?? 0) }}" class="mt-1.5 w-32 rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
    </div>
    <div class="flex gap-3">
        <button class="px-6 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 text-sm font-semibold transition">Simpan</button>
        <a href="{{ route('admin.educations.index') }}" class="px-6 py-2.5 rounded-xl border border-white/15 text-sm">Batal</a>
    </div>
</form>
@endsection
