@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
<div class="flex items-center justify-between">
    <h1 class="font-display font-bold text-3xl">Projects</h1>
    <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 text-sm font-semibold transition">+ Tambah</a>
</div>
<div class="rounded-2xl border border-white/10 overflow-hidden mt-6">
    @forelse($projects as $p)
        <div class="flex items-center gap-4 px-5 py-4 border-b border-white/5 last:border-0 hover:bg-white/5">
            <div class="flex-1 min-w-0">
                <p class="font-semibold truncate">{{ $p->title }} @if($p->is_featured)<span class="text-[10px] px-1.5 py-0.5 rounded bg-emerald-500/15 text-emerald-300 border border-emerald-500/30 ml-1">FEATURED</span>@endif</p>
                <p class="text-xs text-zinc-500 truncate">{{ $p->short_desc }}</p>
            </div>
            <a href="{{ route('projects.show', $p) }}" target="_blank" class="text-xs text-zinc-400 hover:text-emerald-300">Lihat</a>
            <a href="{{ route('admin.projects.edit', $p) }}" class="text-xs px-3 py-1.5 rounded-lg border border-white/15 hover:border-emerald-400/60">Edit</a>
            <form method="POST" action="{{ route('admin.projects.destroy', $p) }}" onsubmit="return confirm('Hapus project ini?')">
                @csrf @method('DELETE')
                <button class="text-xs px-3 py-1.5 rounded-lg border border-red-500/40 text-red-400 hover:bg-red-500/10">Hapus</button>
            </form>
        </div>
    @empty
        <p class="px-5 py-6 text-sm text-zinc-500">Belum ada project.</p>
    @endforelse
</div>
<div class="mt-4">{{ $projects->links() }}</div>
@endsection
