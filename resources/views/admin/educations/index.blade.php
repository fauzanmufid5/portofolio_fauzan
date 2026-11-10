@extends('layouts.admin')

@section('title', 'Educations')

@section('content')
<div class="flex items-center justify-between">
    <h1 class="font-display font-bold text-3xl">Educations</h1>
    <a href="{{ route('admin.educations.create') }}" class="px-4 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 text-sm font-semibold transition">+ Tambah</a>
</div>
<div class="rounded-2xl border border-white/10 overflow-hidden mt-6">
    @forelse($educations as $e)
        <div class="flex items-center gap-4 px-5 py-4 border-b border-white/5 last:border-0 hover:bg-white/5">
            <div class="flex-1 min-w-0">
                <p class="font-semibold truncate">{{ $e->degree }} <span class="font-normal text-emerald-300">· {{ $e->school }}</span></p>
                <p class="text-xs text-zinc-500">{{ $e->year_start }} — {{ $e->year_end ?? 'Sekarang' }}</p>
            </div>
            <a href="{{ route('admin.educations.edit', $e) }}" class="text-xs px-3 py-1.5 rounded-lg border border-white/15 hover:border-emerald-400/60">Edit</a>
            <form method="POST" action="{{ route('admin.educations.destroy', $e) }}" onsubmit="return confirm('Hapus data ini?')">
                @csrf @method('DELETE')
                <button class="text-xs px-3 py-1.5 rounded-lg border border-red-500/40 text-red-400 hover:bg-red-500/10">Hapus</button>
            </form>
        </div>
    @empty
        <p class="px-5 py-6 text-sm text-zinc-500">Belum ada data.</p>
    @endforelse
</div>
@endsection
