<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function __invoke(Request $request)
    {
        $profile = Profile::first();

        if (! $profile?->cv_path || ! Storage::disk('public')->exists($profile->cv_path)) {
            abort(404, 'CV belum tersedia.');
        }

        return Storage::disk('public')->download(
            $profile->cv_path,
            'CV-'.str($profile->name)->slug().'.pdf'
        );
    }
}
