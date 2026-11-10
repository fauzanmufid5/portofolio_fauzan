@extends('layouts.admin')

@section('title', 'Edit Profil')

@section('content')
<h1 class="font-display font-bold text-3xl">Edit Profil</h1>
<p class="text-zinc-500 text-sm mt-1">Data ini tampil di halaman public</p>
<form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="rounded-2xl border border-white/10 bg-zinc-900/60 p-6 mt-6 space-y-5 max-w-2xl">
    @csrf @method('PUT')
    <div class="grid md:grid-cols-2 gap-5">
        <div>
            <label class="text-sm text-zinc-400">Nama *</label>
            <input name="name" value="{{ old('name', $profile->name) }}" required maxlength="100" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <div>
            <label class="text-sm text-zinc-400">Title *</label>
            <input name="title" value="{{ old('title', $profile->title) }}" required maxlength="100" placeholder="Web Developer" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
    </div>
    <div>
        <label class="text-sm text-zinc-400">Bio *</label>
        <textarea name="bio" rows="4" required maxlength="2000" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">{{ old('bio', $profile->bio) }}</textarea>
    </div>
    <div class="grid md:grid-cols-2 gap-5">
        <div>
            <label class="text-sm text-zinc-400">Email *</label>
            <input name="email" type="email" value="{{ old('email', $profile->email) }}" required maxlength="150" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <div>
            <label class="text-sm text-zinc-400">Telepon</label>
            <input name="phone" value="{{ old('phone', $profile->phone) }}" maxlength="50" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <div>
            <label class="text-sm text-zinc-400">Lokasi</label>
            <input name="location" value="{{ old('location', $profile->location) }}" maxlength="100" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <div>
            <label class="text-sm text-zinc-400">WhatsApp URL</label>
            <input name="whatsapp" type="url" value="{{ old('whatsapp', $profile->whatsapp) }}" maxlength="255" placeholder="https://wa.me/62..." class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <div>
            <label class="text-sm text-zinc-400">GitHub URL</label>
            <input name="github" type="url" value="{{ old('github', $profile->github) }}" maxlength="255" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <div>
            <label class="text-sm text-zinc-400">LinkedIn URL</label>
            <input name="linkedin" type="url" value="{{ old('linkedin', $profile->linkedin) }}" maxlength="255" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <div class="md:col-span-2">
            <label class="text-sm text-zinc-400">Instagram URL</label>
            <input name="instagram" type="url" value="{{ old('instagram', $profile->instagram) }}" maxlength="255" class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
    </div>
    <div class="grid md:grid-cols-2 gap-5">
        <div>
            <label class="text-sm text-zinc-400">Foto profil (jpg/png, maks 2MB)</label>
            <input type="file" name="photo" accept="image/*" class="mt-1.5 w-full text-sm text-zinc-400 file:mr-3 file:px-4 file:py-2 file:rounded-lg file:border-0 file:bg-white/10 file:text-white hover:file:bg-white/20">
            @if($profile->photo)<p class="text-xs text-emerald-300 mt-1">✓ Foto sudah terupload</p>@endif
        </div>
        <div>
            <label class="text-sm text-zinc-400">File CV (PDF, maks 5MB)</label>
            <input type="file" name="cv" accept="application/pdf" class="mt-1.5 w-full text-sm text-zinc-400 file:mr-3 file:px-4 file:py-2 file:rounded-lg file:border-0 file:bg-white/10 file:text-white hover:file:bg-white/20">
            @if($profile->cv_path)<p class="text-xs text-emerald-300 mt-1">✓ CV sudah terupload — <a href="{{ route('cv.download') }}" class="underline">unduh</a></p>@endif
        </div>
    </div>
    <button class="px-6 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 text-sm font-semibold transition">Simpan Profil</button>
</form>
@endsection
