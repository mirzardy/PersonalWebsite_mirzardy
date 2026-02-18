<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio\PortfolioEducation;
use App\Models\Portfolio\PortfolioExperience;
use App\Models\Portfolio\PortfolioHobby;
use App\Models\Portfolio\PortfolioLanguage;
use App\Models\Portfolio\PortfolioProfile;
use App\Models\Portfolio\PortfolioSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioProfileController extends Controller
{
    public function edit()
    {
        return view('admin.portfolio.edit', [
            'profile' => PortfolioProfile::with('address')->firstOrFail(),
            'skills'  => PortfolioSkill::orderBy('order')->get(),
            'educations' => PortfolioEducation::orderBy('order')->get(),
            'experiences' => PortfolioExperience::orderBy('order')->get(),
            'languages' => PortfolioLanguage::orderBy('order')->get(),
            'hobbies' => PortfolioHobby::orderBy('order')->get(),
        ]);
    }

    public function update(Request $request)
    {
        $profile = PortfolioProfile::firstOrFail();

        $data = $request->validate([
            'name' => 'required',
            'headline' => 'nullable',
            'about' => 'nullable',
            'photo' => 'nullable|image|max:4096',
            'cv' => 'nullable|mimes:pdf|max:5120',
            'detail_alamat' => 'nullable',
            'rt' => 'nullable',
            'rw' => 'nullable',
            'kelurahan' => 'nullable',
            'kecamatan' => 'nullable',
            'kabupaten_kota' => 'nullable',
            'provinsi' => 'nullable',
            'kode_pos' => 'nullable',
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

        $addressData = [
            'detail_alamat' => $data['detail_alamat'] ?? null,
            'rt' => $data['rt'] ?? null,
            'rw' => $data['rw'] ?? null,
            'kelurahan' => $data['kelurahan'] ?? null,
            'kecamatan' => $data['kecamatan'] ?? null,
            'kabupaten_kota' => $data['kabupaten_kota'] ?? null,
            'provinsi' => $data['provinsi'] ?? null,
            'kode_pos' => $data['kode_pos'] ?? null,
        ];

        $profile->address()->updateOrCreate(
            ['profile_id' => $profile->id],
            $addressData
        );

        return back()->with('success', 'Profile berhasil diperbarui');
    }
}
