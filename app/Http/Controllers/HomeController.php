<?php

namespace App\Http\Controllers;

use App\Models\Portfolio\PortfolioEducation;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Portfolio\PortfolioProfile;
use App\Models\Portfolio\PortfolioSkill;

class HomeController extends Controller
{
    public function index()
    {
        $profile = PortfolioProfile::first();
        $skills = PortfolioSkill::orderBy('order')->get();
        $educations = PortfolioEducation::orderBy('order')->get();

        $posts = Post::latest()->limit(3)->get();

        return view('home', compact('profile', 'skills', 'educations', 'posts'));
    }
}
