@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
<h1 class="font-display font-bold text-3xl">Messages</h1>
<p class="text-zinc-500 text-sm mt-1">{{ $unreadCount }} pesan belum dibaca</p>
<div class="rounded-2xl border border-white/10 overflow-hidden mt-6">
    @forelse($messages as $msg)
        <div class="px-5 py-4 border-b border-white/5 last:border-0 {{ $msg->is_read ? '' : 'bg-emerald-500/5' }}">
            <div class="flex justify-between gap-3 text-sm">
                <p class="font-semibold">{{ $msg->name }} <span class="font-normal text-zinc-500">· {{ $msg->email }}</span></p>
                <p class="text-zinc-500 text-xs whitespace-nowrap">{{ $msg->created_at->format('d M Y H:i') }}</p>
            </div>
            @if($msg->subject)<p class="text-sm text-emerald-300 mt-1">{{ $msg->subject }}</p>@endif
            <p class="text-sm text-zinc-300 mt-1 whitespace-pre-line">{{ $msg->message }}</p>
            <div class="flex gap-2 mt-3">
                <form method="POST" action="{{ route('admin.messages.update', $msg) }}">
                    @csrf @method('PATCH')
                    <button class="text-xs px-3 py-1.5 rounded-lg border border-white/15 hover:border-emerald-400/60">{{ $msg->is_read ? 'Tandai belum dibaca' : 'Tandai dibaca' }}</button>
                </form>
                <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}" onsubmit="return confirm('Hapus pesan ini?')">
                    @csrf @method('DELETE')
                    <button class="text-xs px-3 py-1.5 rounded-lg border border-red-500/40 text-red-400 hover:bg-red-500/10">Hapus</button>
                </form>
            </div>
        </div>
    @empty
        <p class="px-5 py-6 text-sm text-zinc-500">Belum ada pesan.</p>
    @endforelse
</div>
<div class="mt-4">{{ $messages->links() }}</div>
@endsection
