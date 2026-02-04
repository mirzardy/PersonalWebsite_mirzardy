<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\PortfolioExperienceController;
use App\Models\Portfolio\PortfolioEducation;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Portfolio\PortfolioProfile;
use App\Models\Portfolio\PortfolioSkill;
use App\Models\Portfolio\PortfolioExperience;

class HomeController extends Controller
{
    public function index()
    {
        $profile = PortfolioProfile::first();
        $skills = PortfolioSkill::orderBy('order')->get();
        $educations = PortfolioEducation::orderBy('order')->get();
        $experiences = PortfolioExperience::orderBy('order')->get();

        $posts = Post::latest()->limit(3)->get();

        return view('home', compact('profile', 'skills', 'educations', 'experiences', 'posts'));
    }
}
