@extends('layouts.app')

@section('title', $project->title . ' — ' . ($profile->name ?? 'Portofolio'))
@section('meta_desc', $project->short_desc)

@section('content')
<div class="max-w-4xl mx-auto px-5 pt-14">
    <a href="{{ route('projects.index') }}" class="text-sm text-zinc-400 hover:text-emerald-300 transition">← Semua projects</a>

    <div class="mt-5 rounded-3xl overflow-hidden border border-white/10 bg-zinc-900/60">
        @if($project->image)
            <img src="{{ str_starts_with($project->image, 'http') ? $project->image : Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full aspect-video object-cover">
        @endif
        <div class="p-7 md:p-10">
            @if($project->is_featured)
                <span class="text-[11px] font-semibold px-2.5 py-1 rounded-full bg-emerald-500/15 text-emerald-300 border border-emerald-500/30">FEATURED PROJECT</span>
            @endif
            <h1 class="font-display font-bold text-3xl md:text-4xl mt-4">{{ $project->title }}</h1>
            @if($project->tech_stack)
                <div class="flex flex-wrap gap-2 mt-4">
                    @foreach($project->tech_stack as $tech)
                        <span class="text-xs px-3 py-1 rounded-md bg-white/5 border border-white/10 text-zinc-300">{{ $tech }}</span>
                    @endforeach
                </div>
            @endif
            <p class="text-zinc-300 leading-relaxed mt-6 whitespace-pre-line">{{ $project->description }}</p>
            <div class="flex flex-wrap gap-3 mt-8">
                @if($project->demo_url)<a href="{{ $project->demo_url }}" target="_blank" class="px-5 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 text-sm font-semibold transition">🚀 Live Demo</a>@endif
                @if($project->github_url)<a href="{{ $project->github_url }}" target="_blank" class="px-5 py-2.5 rounded-xl border border-white/15 hover:border-emerald-400/60 text-sm font-semibold transition">GitHub</a>@endif
            </div>
        </div>
    </div>

    @if($related->isNotEmpty())
        <h2 class="font-display font-bold text-2xl mt-14 mb-6">Project Lainnya</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($related as $rel)
                @include('partials.project-card', ['project' => $rel])
            @endforeach
        </div>
    @endif
</div>
@endsection
