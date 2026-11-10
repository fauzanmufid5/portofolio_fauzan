@extends('layouts.app')

@section('content')
{{-- HERO --}}
<section class="relative overflow-hidden">
    <div class="grid-bg absolute inset-0"></div>
    <div class="glow-orb w-[480px] h-[480px] bg-emerald-500/20 -top-40 -left-40"></div>
    <div class="glow-orb w-[420px] h-[420px] bg-violet-600/20 top-20 right-[-160px]"></div>

    <div class="relative max-w-6xl mx-auto px-5 pt-20 pb-16 md:pt-28 md:pb-24 grid md:grid-cols-[1.4fr_1fr] gap-12 items-center">
        <div>
            <p class="reveal inline-flex items-center gap-2 text-xs font-semibold tracking-widest text-emerald-300 border border-emerald-500/30 bg-emerald-500/10 rounded-full px-4 py-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> TERBUKA UNTUK PROJECT & KERJA SAMA
            </p>
            <h1 class="reveal font-display font-bold text-4xl md:text-6xl leading-[1.05] mt-6">
                Halo, saya<br><span class="text-gradient">{{ $profile->name ?? 'Fauzan' }}</span>
            </h1>
            <p class="reveal font-display text-xl md:text-2xl text-zinc-300 mt-4 h-8">
                <span data-typing="{{ $profile->title ?? 'Web Developer' }}|Laravel Developer|Tailwind Enthusiast|Freelancer"></span><span class="typing-caret text-emerald-400">▍</span>
            </p>
            <p class="reveal text-zinc-400 mt-4 max-w-xl leading-relaxed">{{ Str::limit($profile->bio ?? '', 220) }}</p>
            <div class="reveal flex flex-wrap gap-3 mt-8">
                <a href="{{ route('projects.index') }}" class="px-6 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 font-semibold transition shadow-lg shadow-emerald-500/25">Lihat Karya →</a>
                <a href="{{ route('cv.download') }}" class="px-6 py-3 rounded-xl border border-white/15 hover:border-emerald-400/60 hover:text-emerald-300 transition font-semibold">⬇ Download CV</a>
            </div>
            <div class="reveal flex gap-8 mt-10 text-sm">
                <div><p class="font-display font-bold text-2xl">{{ \App\Models\Project::count() }}+</p><p class="text-zinc-500">Projects</p></div>
                <div><p class="font-display font-bold text-2xl">{{ \App\Models\Experience::count() }}+</p><p class="text-zinc-500">Pengalaman</p></div>
                <div><p class="font-display font-bold text-2xl">{{ \App\Models\Skill::count() }}+</p><p class="text-zinc-500">Skills</p></div>
            </div>
        </div>
        <div class="reveal hidden md:flex justify-center">
            <div class="animate-float-slow relative w-72 h-72">
                <div class="absolute inset-0 rounded-[2rem] bg-gradient-to-br from-emerald-400/30 via-cyan-500/20 to-violet-600/30 blur-2xl"></div>
                <div class="relative w-full h-full rounded-[2rem] border border-white/15 bg-zinc-900/80 flex flex-col items-center justify-center gap-2">
                    @if(!empty($profile->photo))
                        <img src="{{ Storage::url($profile->photo) }}" alt="Foto" class="w-full h-full object-cover rounded-[2rem]">
                    @else
                        <span class="font-display font-bold text-8xl text-gradient">{{ substr($profile->name ?? 'F', 0, 1) }}</span>
                        <span class="text-zinc-500 text-sm tracking-widest font-display">{{ strtoupper($profile->title ?? 'WEB DEVELOPER') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SKILLS MARQUEE --}}
<section class="border-y border-white/10 bg-zinc-950/60 py-5 overflow-hidden">
    <div class="flex whitespace-nowrap animate-marquee gap-3 w-max">
        @foreach(array_merge($skills->pluck('name')->all(), $skills->pluck('name')->all()) as $skill)
            <span class="text-sm px-4 py-1.5 rounded-full border border-white/10 bg-white/5 text-zinc-300">{{ $skill }}</span>
        @endforeach
    </div>
</section>

{{-- FEATURED PROJECTS --}}
<section class="max-w-6xl mx-auto px-5 mt-20">
    <div class="reveal flex items-end justify-between mb-8">
        <div>
            <p class="text-emerald-300 text-xs font-semibold tracking-widest">PILIHAN TERBAIK</p>
            <h2 class="font-display font-bold text-3xl mt-2">Featured Projects</h2>
        </div>
        <a href="{{ route('projects.index') }}" class="text-sm text-zinc-400 hover:text-emerald-300 transition">Semua →</a>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        @forelse($featured as $project)
            @include('partials.project-card', ['project' => $project])
        @empty
            <p class="text-zinc-500">Belum ada project featured.</p>
        @endforelse
    </div>
</section>

{{-- EXPERIENCE PREVIEW --}}
<section class="max-w-6xl mx-auto px-5 mt-20">
    <p class="reveal text-emerald-300 text-xs font-semibold tracking-widest">KARIR</p>
    <h2 class="reveal font-display font-bold text-3xl mt-2 mb-8">Pengalaman Terakhir</h2>
    <div class="grid md:grid-cols-3 gap-6">
        @foreach($experiences as $exp)
            <div class="reveal rounded-2xl border border-white/10 bg-zinc-900/60 p-6">
                <p class="font-display font-semibold">{{ $exp->position }}</p>
                <p class="text-emerald-300 text-sm">{{ $exp->company }}</p>
                <p class="text-xs text-zinc-500 mt-1">{{ $exp->start_date->format('M Y') }} — {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Sekarang' }}</p>
            </div>
        @endforeach
    </div>
    <a href="{{ route('experience') }}" class="reveal inline-block mt-6 text-sm text-zinc-400 hover:text-emerald-300 transition">Lihat riwayat lengkap →</a>
</section>

{{-- CTA --}}
<section class="max-w-6xl mx-auto px-5 mt-20">
    <div class="reveal relative overflow-hidden rounded-3xl border border-emerald-500/25 bg-gradient-to-br from-emerald-500/15 via-zinc-900 to-violet-600/15 p-10 md:p-14 text-center">
        <h2 class="font-display font-bold text-3xl md:text-4xl">Punya ide project? <span class="text-gradient">Mari wujudkan.</span></h2>
        <p class="text-zinc-400 mt-3">Respons cepat via WhatsApp atau form kontak.</p>
        <div class="flex flex-wrap justify-center gap-3 mt-7">
            <a href="{{ route('contact.create') }}" class="px-6 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 font-semibold transition">Hubungi Saya</a>
            @if(!empty($profile->whatsapp))
                <a href="{{ $profile->whatsapp }}" target="_blank" class="px-6 py-3 rounded-xl border border-white/15 hover:border-emerald-400/60 transition font-semibold">WhatsApp</a>
            @endif
        </div>
    </div>
</section>
@endsection
