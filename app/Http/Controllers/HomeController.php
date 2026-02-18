<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\PortfolioExperienceController;
use App\Models\Portfolio\PortfolioEducation;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Portfolio\PortfolioProfile;
use App\Models\Portfolio\PortfolioSkill;
use App\Models\Portfolio\PortfolioExperience;
use App\Models\Portfolio\PortfolioHobby;
use App\Models\Portfolio\PortfolioLanguage;
use App\Models\Contact\Contact;
use App\Models\Contact\Link;

class HomeController extends Controller
{
    public function index()
    {
        $profile = PortfolioProfile::with('address')->first();
        $skills = PortfolioSkill::orderBy('order')->get();
        $educations = PortfolioEducation::orderBy('order')->get();
        $experiences = PortfolioExperience::orderBy('order')->get();
        $languages = PortfolioLanguage::orderBy('order')->get();
        $hobbies = PortfolioHobby::orderBy('order')->get();

        $posts = Post::latest()->limit(3)->get();

        $contact = Contact::first();
        $links = Link::all();

        return view('home', compact('profile', 'skills', 'educations', 'experiences', 'languages', 'hobbies', 'posts', 'contact', 'links'));
    }
}
