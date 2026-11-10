<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.home', [
            'profile' => Profile::first(),
            'featured' => Project::where('is_featured', true)->orderBy('sort_order')->take(3)->get(),
            'skills' => Skill::orderBy('level', 'desc')->take(8)->get(),
            'experiences' => Experience::orderBy('start_date', 'desc')->take(3)->get(),
        ]);
    }

    public function about()
    {
        return view('public.about', [
            'profile' => Profile::first(),
            'educations' => Education::orderBy('year_start', 'desc')->get(),
            'skills' => Skill::orderBy('category')->orderBy('level', 'desc')->get(),
        ]);
    }

    public function experience()
    {
        return view('public.experience', [
            'profile' => Profile::first(),
            'experiences' => Experience::orderBy('start_date', 'desc')->get(),
            'educations' => Education::orderBy('year_start', 'desc')->get(),
        ]);
    }
}
