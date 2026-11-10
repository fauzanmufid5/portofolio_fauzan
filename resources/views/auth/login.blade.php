<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin — Portofolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center px-5">
    <div class="glow-orb w-[420px] h-[420px] bg-emerald-500/15 -top-20 left-1/3"></div>
    <form method="POST" action="{{ route('login') }}" class="relative w-full max-w-sm rounded-3xl border border-white/10 bg-zinc-900/70 p-8 space-y-5">
        @csrf
        <div class="text-center">
            <span class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-400 to-cyan-500 text-zinc-950 font-display font-bold text-xl">A</span>
            <h1 class="font-display font-bold text-2xl mt-4">Login Admin</h1>
            <p class="text-sm text-zinc-500">Kelola konten portofolio</p>
        </div>
        @if($errors->any())
            <p class="text-sm text-red-400 bg-red-500/10 border border-red-500/30 rounded-xl px-4 py-2.5">{{ $errors->first() }}</p>
        @endif
        <div>
            <label class="text-sm text-zinc-400">Email</label>
            <input name="email" type="email" value="{{ old('email') }}" required autofocus
                class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <div>
            <label class="text-sm text-zinc-400">Password</label>
            <input name="password" type="password" required
                class="mt-1.5 w-full rounded-xl bg-zinc-950 border border-white/10 px-4 py-2.5 text-sm focus:outline-none focus:border-emerald-400/70">
        </div>
        <label class="flex items-center gap-2 text-sm text-zinc-400">
            <input type="checkbox" name="remember" class="accent-emerald-500"> Ingat saya
        </label>
        <button class="w-full py-3 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 font-semibold transition">Masuk</button>
        <a href="{{ route('home') }}" class="block text-center text-sm text-zinc-500 hover:text-emerald-300">← Kembali ke web</a>
    </form>
</body>
</html>
