@extends('layouts.app')

@section('title', 'Kontak — ' . ($profile->name ?? 'Portofolio'))

@section('content')
<div class="max-w-6xl mx-auto px-5 pt-14">
    <p class="reveal text-emerald-300 text-xs font-semibold tracking-widest">HUBUNGI SAYA</p>
    <h1 class="reveal font-display font-bold text-4xl mt-2">Mari Terhubung</h1>

    <div class="grid md:grid-cols-[1fr_1.4fr] gap-8 mt-10 items-start">
        <div class="space-y-4">
            @if($profile->email)
                <div class="reveal rounded-2xl border border-white/10 bg-zinc-900/60 p-5">
                    <p class="text-xs text-zinc-500 tracking-widest">EMAIL</p>
                    <p class="font-semibold mt-1">{{ $profile->email }}</p>
                </div>
            @endif
            @if($profile->location)
                <div class="reveal rounded-2xl border border-white/10 bg-zinc-900/60 p-5">
                    <p class="text-xs text-zinc-500 tracking-widest">LOKASI</p>
                    <p class="font-semibold mt-1">{{ $profile->location }}</p>
                </div>
            @endif
            <div class="reveal rounded-2xl border border-white/10 bg-zinc-900/60 p-5">
                <p class="text-xs text-zinc-500 tracking-widest">SOSIAL MEDIA</p>
                <div class="flex flex-wrap gap-2 mt-2">
                    @if($profile->github)<a href="{{ $profile->github }}" target="_blank" class="text-xs px-3 py-1.5 rounded-lg bg-white/5 border border-white/10 hover:border-emerald-400/60 transition">GitHub</a>@endif
                    @if($profile->linkedin)<a href="{{ $profile->linkedin }}" target="_blank" class="text-xs px-3 py-1.5 rounded-lg bg-white/5 border border-white/10 hover:border-emerald-400/60 transition">LinkedIn</a>@endif
                    @if($profile->instagram)<a href="{{ $profile->instagram }}" target="_blank" class="text-xs px-3 py-1.5 rounded-lg bg-white/5 border border-white/10 hover:border-emerald-400/60 transition">Instagram</a>@endif
                    @if($profile->whatsapp)<a href="{{ $profile->whatsapp }}" target="_blank" class="text-xs px-3 py-1.5 rounded-lg bg-emerald-500/15 border border-emerald-500/40 text-emerald-300 transition">WhatsApp</a>@endif
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('contact.store') }}" class="reveal rounded-3xl border border-white/10 bg-zinc-900/60 p-7 space-y-5">
            @csrf
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="text-sm text-zinc-400">Nama *</label>
                    <input name="name" value="{{ old('name') }}" required maxlength="100" placeholder="Nama kamu"
                        class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
                    @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-sm text-zinc-400">Email *</label>
                    <input name="email" type="email" value="{{ old('email') }}" required maxlength="150" placeholder="email@contoh.com"
                        class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
                    @error('email')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label class="text-sm text-zinc-400">Subjek</label>
                <input name="subject" value="{{ old('subject') }}" maxlength="150" placeholder="Contoh: Tawaran project website"
                    class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
                @error('subject')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm text-zinc-400">Pesan *</label>
                <textarea name="message" rows="5" required minlength="10" maxlength="2000" placeholder="Tulis pesanmu (min. 10 karakter)"
                    class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">{{ old('message') }}</textarea>
                @error('message')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <button class="w-full py-3 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 font-semibold transition">Kirim Pesan ✉</button>
        </form>
    </div>
</div>
@endsection
