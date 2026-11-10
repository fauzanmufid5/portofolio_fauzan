<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — Portofolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    <div class="flex min-h-screen">
        <aside class="w-60 shrink-0 border-r border-white/10 bg-zinc-950 p-5 hidden md:flex flex-col gap-1">
            <a href="{{ route('admin.dashboard') }}" class="font-display font-bold text-lg mb-6">🛠 Admin Panel</a>
            @php
                $nav = [
                    ['Dashboard', 'admin.dashboard', []],
                    ['Projects', 'admin.projects.index', ['admin.projects.*']],
                    ['Experiences', 'admin.experiences.index', ['admin.experiences.*']],
                    ['Educations', 'admin.educations.index', ['admin.educations.*']],
                    ['Skills', 'admin.skills.index', ['admin.skills.*']],
                    ['Profil', 'admin.profile.edit', ['admin.profile.*']],
                    ['Messages', 'admin.messages.index', ['admin.messages.*']],
                ];
            @endphp
            @foreach($nav as [$label, $route, $active])
                <a href="{{ route($route) }}" class="px-4 py-2.5 rounded-xl text-sm transition {{ request()->routeIs($route, ...$active) ? 'bg-emerald-500/15 text-emerald-300 border border-emerald-500/30' : 'text-zinc-400 hover:bg-white/5 hover:text-white' }}">{{ $label }}</a>
            @endforeach
            <div class="mt-auto pt-4 border-t border-white/10">
                <a href="{{ route('home') }}" target="_blank" class="block px-4 py-2.5 text-sm text-zinc-400 hover:text-white">↗ Lihat Web</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-4 py-2.5 text-sm text-red-400 hover:bg-red-500/10 rounded-xl">Logout</button>
                </form>
            </div>
        </aside>
        <div class="flex-1 min-w-0">
            <div class="md:hidden glass border-b border-white/10 px-5 py-3 flex items-center gap-3 text-sm overflow-x-auto">
                <a href="{{ route('admin.dashboard') }}" class="whitespace-nowrap">Dashboard</a>
                <a href="{{ route('admin.projects.index') }}" class="whitespace-nowrap">Projects</a>
                <a href="{{ route('admin.experiences.index') }}" class="whitespace-nowrap">Exp</a>
                <a href="{{ route('admin.skills.index') }}" class="whitespace-nowrap">Skills</a>
                <a href="{{ route('admin.messages.index') }}" class="whitespace-nowrap">Messages</a>
                <form method="POST" action="{{ route('logout') }}">@csrf<button class="text-red-400">Logout</button></form>
            </div>
            <main class="p-6 md:p-10 max-w-5xl">
                @if(session('success'))
                    <p class="mb-6 text-sm text-emerald-300 bg-emerald-500/10 border border-emerald-500/30 rounded-xl px-4 py-3">✓ {{ session('success') }}</p>
                @endif
                @if($errors->any())
                    <div class="mb-6 text-sm text-red-300 bg-red-500/10 border border-red-500/30 rounded-xl px-4 py-3">
                        @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
