@extends('layouts.app')

@section('title', 'Tentang — ' . ($profile->name ?? 'Portofolio'))

@section('content')
<div class="max-w-6xl mx-auto px-5 pt-14">
    <p class="reveal text-emerald-300 text-xs font-semibold tracking-widest">TENTANG SAYA</p>
    <h1 class="reveal font-display font-bold text-4xl mt-2">Profil & Keahlian</h1>

    <div class="grid md:grid-cols-[1fr_1.5fr] gap-10 mt-10 items-start">
        <div class="reveal rounded-3xl border border-white/10 bg-zinc-900/60 p-8 text-center">
            <div class="w-36 h-36 mx-auto rounded-3xl bg-gradient-to-br from-emerald-400/40 to-violet-600/40 flex items-center justify-center overflow-hidden">
                @if(!empty($profile->photo))
                    <img src="{{ Storage::url($profile->photo) }}" alt="Foto" class="w-full h-full object-cover">
                @else
                    <span class="font-display font-bold text-6xl text-white">{{ substr($profile->name ?? 'F', 0, 1) }}</span>
                @endif
            </div>
            <h2 class="font-display font-bold text-xl mt-5">{{ $profile->name }}</h2>
            <p class="text-emerald-300 text-sm">{{ $profile->title }}</p>
            <div class="text-sm text-zinc-400 mt-4 space-y-1">
                @if($profile->location)<p>📍 {{ $profile->location }}</p>@endif
                @if($profile->email)<p>✉ {{ $profile->email }}</p>@endif
                @if($profile->phone)<p>📱 {{ $profile->phone }}</p>@endif
            </div>
            <a href="{{ route('cv.download') }}" class="inline-block mt-6 px-5 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 text-sm font-semibold transition">⬇ Download CV</a>
        </div>
        <div class="reveal">
            <h3 class="font-display font-semibold text-xl">Bio</h3>
            <p class="text-zinc-300 leading-relaxed mt-3 whitespace-pre-line">{{ $profile->bio }}</p>

            <h3 class="font-display font-semibold text-xl mt-10 mb-5">Skills</h3>
            <div class="space-y-4">
                @foreach($skills as $skill)
                    <div>
                        <div class="flex justify-between text-sm mb-1.5">
                            <span class="text-zinc-200">{{ $skill->name }}</span>
                            <span class="text-zinc-500">{{ $skill->level }}% · {{ ucfirst($skill->category) }}</span>
                        </div>
                        <div class="h-2 rounded-full bg-white/5 overflow-hidden">
                            <div class="h-full rounded-full bg-gradient-to-r from-emerald-400 to-cyan-400" style="width: {{ $skill->level }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <h3 class="reveal font-display font-semibold text-xl mt-14 mb-6">Pendidikan</h3>
    <div class="grid md:grid-cols-2 gap-5">
        @foreach($educations as $edu)
            <div class="reveal rounded-2xl border border-white/10 bg-zinc-900/60 p-6">
                <p class="font-display font-semibold">{{ $edu->degree }}</p>
                <p class="text-emerald-300 text-sm">{{ $edu->school }}</p>
                <p class="text-xs text-zinc-500 mt-1">{{ $edu->year_start }} — {{ $edu->year_end ?? 'Sekarang' }}</p>
                @if($edu->description)<p class="text-sm text-zinc-400 mt-2">{{ $edu->description }}</p>@endif
            </div>
        @endforeach
    </div>
</div>
@endsection
