@extends('layouts.app')

@section('title', 'Experience — ' . ($profile->name ?? 'Portofolio'))

@section('content')
<div class="max-w-4xl mx-auto px-5 pt-14">
    <p class="reveal text-emerald-300 text-xs font-semibold tracking-widest">Jejak KARIR</p>
    <h1 class="reveal font-display font-bold text-4xl mt-2">Experience</h1>
    <a href="{{ route('cv.download') }}" class="reveal inline-block mt-5 px-5 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 text-sm font-semibold transition">⬇ Download CV (PDF)</a>

    <h2 class="reveal font-display font-semibold text-xl mt-12 mb-6">Pengalaman Kerja</h2>
    <div class="relative pl-8 space-y-6 before:absolute before:left-2 before:top-2 before:bottom-2 before:w-px before:bg-gradient-to-b before:from-emerald-400 before:to-violet-500">
        @forelse($experiences as $exp)
            <div class="reveal relative rounded-2xl border border-white/10 bg-zinc-900/60 p-6">
                <span class="absolute -left-8 top-7 w-4 h-4 rounded-full bg-emerald-400 border-4 border-zinc-950" style="left: -2.05rem"></span>
                <div class="flex flex-wrap items-baseline justify-between gap-2">
                    <p class="font-display font-semibold text-lg">{{ $exp->position }}</p>
                    <p class="text-xs text-zinc-500">{{ $exp->start_date->format('M Y') }} — {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Sekarang' }}</p>
                </div>
                <p class="text-emerald-300 text-sm mt-0.5">{{ $exp->company }}</p>
                @if($exp->description)<p class="text-sm text-zinc-400 mt-2 leading-relaxed">{{ $exp->description }}</p>@endif
            </div>
        @empty
            <p class="text-zinc-500">Belum ada pengalaman.</p>
        @endforelse
    </div>

    <h2 class="reveal font-display font-semibold text-xl mt-12 mb-6">Pendidikan</h2>
    <div class="grid md:grid-cols-2 gap-5">
        @foreach($educations as $edu)
            <div class="reveal rounded-2xl border border-white/10 bg-zinc-900/60 p-6">
                <p class="font-display font-semibold">{{ $edu->degree }}</p>
                <p class="text-emerald-300 text-sm">{{ $edu->school }}</p>
                <p class="text-xs text-zinc-500 mt-1">{{ $edu->year_start }} — {{ $edu->year_end ?? 'Sekarang' }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
