@extends('layouts.app')

@section('title', 'Halaman tidak ditemukan')

@section('content')
<div class="max-w-xl mx-auto px-5 py-28 text-center">
    <p class="font-display font-bold text-8xl text-gradient">404</p>
    <h1 class="font-display font-bold text-2xl mt-4">Halaman tidak ditemukan</h1>
    <p class="text-zinc-400 mt-2">Sepertinya kamu tersesat. Mari kembali ke jalan yang benar.</p>
    <a href="{{ route('home') }}" class="inline-block mt-7 px-6 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-zinc-950 font-semibold transition">← Kembali ke Home</a>
</div>
@endsection
