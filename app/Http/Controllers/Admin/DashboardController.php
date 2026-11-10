<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Message;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('admin.dashboard', [
            'projectCount' => Project::count(),
            'skillCount' => Skill::count(),
            'experienceCount' => Experience::count(),
            'unreadCount' => Message::where('is_read', false)->count(),
            'latestMessages' => Message::latest()->take(5)->get(),
        ]);
    }
}
