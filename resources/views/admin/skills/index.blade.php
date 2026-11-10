@extends('layouts.admin')

@section('title', 'Skills')

@section('content')
<div class="flex items-center justify-between">
    <h1 class="font-display font-bold text-3xl">Skills</h1>
    <a href="{{ route('admin.skills.create') }}" class="px-4 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 text-sm font-semibold transition">+ Tambah</a>
</div>
<div class="rounded-2xl border border-white/10 overflow-hidden mt-6">
    @forelse($skills as $s)
        <div class="flex items-center gap-4 px-5 py-4 border-b border-white/5 last:border-0 hover:bg-white/5">
            <div class="flex-1 min-w-0">
                <p class="font-semibold">{{ $s->name }} <span class="font-normal text-xs text-zinc-500">· {{ ucfirst($s->category) }}</span></p>
                <div class="h-1.5 rounded-full bg-white/5 mt-2 max-w-xs overflow-hidden">
                    <div class="h-full rounded-full bg-gradient-to-r from-emerald-400 to-cyan-400" style="width: {{ $s->level }}%"></div>
                </div>
            </div>
            <span class="text-xs text-zinc-500">{{ $s->level }}%</span>
            <a href="{{ route('admin.skills.edit', $s) }}" class="text-xs px-3 py-1.5 rounded-lg border border-white/15 hover:border-emerald-400/60">Edit</a>
            <form method="POST" action="{{ route('admin.skills.destroy', $s) }}" onsubmit="return confirm('Hapus skill ini?')">
                @csrf @method('DELETE')
                <button class="text-xs px-3 py-1.5 rounded-lg border border-red-500/40 text-red-400 hover:bg-red-500/10">Hapus</button>
            </form>
        </div>
    @empty
        <p class="px-5 py-6 text-sm text-zinc-500">Belum ada data.</p>
    @endforelse
</div>
@endsection
