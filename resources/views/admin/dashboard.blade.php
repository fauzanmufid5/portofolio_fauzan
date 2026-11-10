@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h1 class="font-display font-bold text-3xl">Dashboard</h1>
<p class="text-zinc-500 text-sm mt-1">Ringkasan konten portofolio</p>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
    <a href="{{ route('admin.projects.index') }}" class="rounded-2xl border border-white/10 bg-zinc-900/60 p-5 card-hover">
        <p class="font-display font-bold text-3xl text-emerald-300">{{ $projectCount }}</p>
        <p class="text-sm text-zinc-400">Projects</p>
    </a>
    <a href="{{ route('admin.experiences.index') }}" class="rounded-2xl border border-white/10 bg-zinc-900/60 p-5 card-hover">
        <p class="font-display font-bold text-3xl text-cyan-300">{{ $experienceCount }}</p>
        <p class="text-sm text-zinc-400">Experiences</p>
    </a>
    <a href="{{ route('admin.skills.index') }}" class="rounded-2xl border border-white/10 bg-zinc-900/60 p-5 card-hover">
        <p class="font-display font-bold text-3xl text-violet-300">{{ $skillCount }}</p>
        <p class="text-sm text-zinc-400">Skills</p>
    </a>
    <a href="{{ route('admin.messages.index') }}" class="rounded-2xl border border-white/10 bg-zinc-900/60 p-5 card-hover">
        <p class="font-display font-bold text-3xl text-amber-300">{{ $unreadCount }}</p>
        <p class="text-sm text-zinc-400">Pesan belum dibaca</p>
    </a>
</div>

<h2 class="font-display font-semibold text-xl mt-10 mb-4">Pesan Terbaru</h2>
<div class="rounded-2xl border border-white/10 overflow-hidden">
    @forelse($latestMessages as $msg)
        <a href="{{ route('admin.messages.index') }}" class="block px-5 py-4 border-b border-white/5 last:border-0 hover:bg-white/5 transition {{ $msg->is_read ? '' : 'bg-emerald-500/5' }}">
            <div class="flex justify-between gap-3 text-sm">
                <p class="font-semibold">{{ $msg->name }} <span class="font-normal text-zinc-500">· {{ $msg->email }}</span></p>
                <p class="text-zinc-500 text-xs whitespace-nowrap">{{ $msg->created_at->diffForHumans() }}</p>
            </div>
            <p class="text-sm text-zinc-400 truncate mt-0.5">{{ $msg->message }}</p>
        </a>
    @empty
        <p class="px-5 py-6 text-sm text-zinc-500">Belum ada pesan masuk.</p>
    @endforelse
</div>
@endsection
