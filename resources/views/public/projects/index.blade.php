@extends('layouts.app')

@section('title', 'Projects — ' . ($profile->name ?? 'Portofolio'))

@section('content')
<div class="max-w-6xl mx-auto px-5 pt-14" x-data="{ filter: 'all' }">
    <p class="reveal text-emerald-300 text-xs font-semibold tracking-widest">KARYA SAYA</p>
    <h1 class="reveal font-display font-bold text-4xl mt-2">Semua Projects</h1>

    @if($techs->isNotEmpty())
        <div class="reveal flex flex-wrap gap-2 mt-7">
            <button @click="filter = 'all'" :class="filter === 'all' ? 'bg-emerald-500 text-zinc-950 border-emerald-500' : 'border-white/15 text-zinc-300'" class="text-xs font-semibold px-4 py-1.5 rounded-full border transition">Semua</button>
            @foreach($techs as $tech)
                <button @click="filter = '{{ $tech }}'" :class="filter === '{{ $tech }}' ? 'bg-emerald-500 text-zinc-950 border-emerald-500' : 'border-white/15 text-zinc-300'" class="text-xs font-semibold px-4 py-1.5 rounded-full border transition">{{ $tech }}</button>
            @endforeach
        </div>
    @endif

    <div class="grid md:grid-cols-3 gap-6 mt-8">
        @forelse($projects as $project)
            <div x-show="filter === 'all' || {{ json_encode($project->tech_stack ?? []) }}.includes(filter)" x-transition>
                @include('partials.project-card', ['project' => $project])
            </div>
        @empty
            <p class="text-zinc-500">Belum ada project.</p>
        @endforelse
    </div>
</div>
@endsection
