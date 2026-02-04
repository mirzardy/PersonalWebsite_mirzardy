<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio\PortfolioProfile;
use App\Models\Portfolio\PortfolioSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioProfileController extends Controller
{
    public function edit()
    {
        return view('admin.portfolio.edit', [
        'profile' => PortfolioProfile::firstOrFail(),
        'skills'  => PortfolioSkill::orderBy('order')->get(),
    ]);
    }

    public function update(Request $request)
    {
        $profile = PortfolioProfile::firstOrFail();

        $data = $request->validate([
            'name' => 'required',
            'headline' => 'nullable',
            'about' => 'nullable',
            'photo' => 'nullable|image|max:2048',
            'cv' => 'nullable|mimes:pdf|max:5120',
            'address' => 'nullable',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                ->store('profile', 'public');
        }

        if ($request->hasFile('cv')) {
            $data['cv'] = $request->file('cv')
                ->store('cv', 'public');
        }

        $profile->update($data);

        return back()->with('success', 'Profile berhasil diperbarui');
    }
}
