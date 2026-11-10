<footer class="border-t border-white/10 mt-20">
    <div class="max-w-6xl mx-auto px-5 py-10 flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="text-sm text-zinc-400">
            <p class="font-display font-semibold text-zinc-200">{{ $profile->name ?? 'Portofolio' }}</p>
            <p>© {{ date('Y') }} — Dibuat dengan Laravel & Tailwind CSS.</p>
        </div>
        <div class="flex items-center gap-4 text-sm">
            @if(!empty($profile->github))<a href="{{ $profile->github }}" target="_blank" class="text-zinc-400 hover:text-emerald-300 transition">GitHub</a>@endif
            @if(!empty($profile->linkedin))<a href="{{ $profile->linkedin }}" target="_blank" class="text-zinc-400 hover:text-emerald-300 transition">LinkedIn</a>@endif
            @if(!empty($profile->instagram))<a href="{{ $profile->instagram }}" target="_blank" class="text-zinc-400 hover:text-emerald-300 transition">Instagram</a>@endif
            @if(!empty($profile->whatsapp))<a href="{{ $profile->whatsapp }}" target="_blank" class="text-zinc-400 hover:text-emerald-300 transition">WhatsApp</a>@endif
        </div>
    </div>
</footer>
