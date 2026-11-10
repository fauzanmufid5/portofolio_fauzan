<header x-data="{ open: false }" class="sticky top-0 z-50 glass border-b border-white/10">
    <nav class="max-w-6xl mx-auto px-5 h-16 flex items-center justify-between">
        <a href="{{ route('home') }}" class="font-display font-bold text-lg tracking-tight">
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-400 to-cyan-500 text-zinc-950 font-bold mr-2">{{ substr($profile->name ?? 'F', 0, 1) }}</span>{{ $profile->name ?? 'Portofolio' }}
        </a>
        <div class="hidden md:flex items-center gap-7 text-sm text-zinc-300">
            <a href="{{ route('home') }}" class="hover:text-emerald-300 transition {{ request()->routeIs('home') ? 'text-emerald-300' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="hover:text-emerald-300 transition {{ request()->routeIs('about') ? 'text-emerald-300' : '' }}">Tentang</a>
            <a href="{{ route('projects.index') }}" class="hover:text-emerald-300 transition {{ request()->routeIs('projects.*') ? 'text-emerald-300' : '' }}">Projects</a>
            <a href="{{ route('experience') }}" class="hover:text-emerald-300 transition {{ request()->routeIs('experience') ? 'text-emerald-300' : '' }}">Experience</a>
            <a href="{{ route('contact.create') }}" class="px-4 py-2 rounded-lg bg-emerald-500 hover:bg-emerald-400 text-zinc-950 font-semibold transition">Kontak</a>
        </div>
        <button @click="open = !open" class="md:hidden text-2xl text-zinc-300" aria-label="Menu">☰</button>
    </nav>
    <div x-show="open" x-cloak class="md:hidden border-t border-white/10 px-5 py-4 flex flex-col gap-3 text-zinc-200 bg-zinc-950/95">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">Tentang</a>
        <a href="{{ route('projects.index') }}">Projects</a>
        <a href="{{ route('experience') }}">Experience</a>
        <a href="{{ route('contact.create') }}" class="px-4 py-2 rounded-lg bg-emerald-500 text-zinc-950 font-semibold text-center">Kontak</a>
    </div>
</header>
