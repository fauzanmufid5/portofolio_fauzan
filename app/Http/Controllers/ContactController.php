<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Profile;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('public.contact', ['profile' => Profile::first()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'nullable|string|max:150',
            'message' => 'required|string|min:10|max:2000',
        ]);

        Message::create($data);

        return back()->with('success', 'Pesan terkirim! Terima kasih sudah menghubungi saya.');
    }
}
