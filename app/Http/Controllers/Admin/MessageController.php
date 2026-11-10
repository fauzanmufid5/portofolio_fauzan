<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.messages.index', [
            'messages' => Message::latest()->paginate(15),
            'unreadCount' => Message::where('is_read', false)->count(),
        ]);
    }

    public function update(Message $message)
    {
        $message->update(['is_read' => ! $message->is_read]);

        return back()->with('success', 'Status pesan diperbarui.');
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return back()->with('success', 'Pesan dihapus.');
    }
}
