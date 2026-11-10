<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.form', [
            'profile' => Profile::firstOrNew([]),
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'title' => 'required|string|max:100',
            'bio' => 'required|string|max:2000',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:100',
            'github' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'whatsapp' => 'nullable|url|max:255',
            'photo' => 'nullable|image|max:2048',
            'cv' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $profile = Profile::firstOrNew([]);

        if ($request->hasFile('photo')) {
            if ($profile->photo) {
                Storage::disk('public')->delete($profile->photo);
            }
            $data['photo'] = $request->file('photo')->store('profile', 'public');
        } else {
            unset($data['photo']);
        }

        if ($request->hasFile('cv')) {
            if ($profile->cv_path) {
                Storage::disk('public')->delete($profile->cv_path);
            }
            $data['cv_path'] = $request->file('cv')->store('cv', 'public');
        }

        unset($data['cv']);
        $profile->fill($data)->save();

        return back()->with('success', 'Profil diperbarui.');
    }
}
