<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', ($profile->name ?? 'Portofolio') . ' — ' . ($profile->title ?? 'Web Developer'))</title>
    <meta name="description" content="@yield('meta_desc', Str::limit($profile->bio ?? 'Portofolio web developer.', 160))">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%2310b981'/><text x='50' y='68' font-size='52' text-anchor='middle' fill='white' font-family='sans-serif' font-weight='bold'>{{ substr($profile->name ?? 'F', 0, 1) }}</text></svg>">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="grain min-h-screen flex flex-col antialiased">
    @include('partials.navbar')

    <main class="flex-1">
        @yield('content')
    </main>

    @include('partials.footer')

    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4500)"
            class="fixed bottom-6 right-6 z-[70] glass border border-emerald-500/40 rounded-xl px-5 py-4 shadow-2xl flex items-start gap-3 max-w-sm">
            <span class="text-emerald-400 text-xl">✓</span>
            <div class="text-sm">
                <p class="font-semibold text-emerald-300">Berhasil</p>
                <p class="text-zinc-300">{{ session('success') }}</p>
            </div>
            <button @click="show = false" class="text-zinc-500 hover:text-white ml-2">✕</button>
        </div>
    @endif
</body>
</html>
