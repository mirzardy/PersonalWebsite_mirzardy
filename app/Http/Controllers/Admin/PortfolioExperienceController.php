<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio\PortfolioExperience;

class PortfolioExperienceController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'company'     => 'required|string|max:100',
            'position'    => 'nullable|string|max:100',
            'type'        => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'start_year'  => 'nullable|integer|min:1900|max:' . date('Y'),
            'end_year'    => 'nullable|integer|min:1900|max:' . date('Y'),
            'is_current'  => 'nullable|boolean',
        ]);

        $data['is_current'] = $request->boolean('is_current');
        $data['order'] = PortfolioExperience::max('order') + 1;

        PortfolioExperience::create($data);

        return back()->with('experience_success', 'Experience ditambahkan');
    }

    public function update(Request $request, PortfolioExperience $portfolio_experience)
    {
        $data = $request->validate([
            'company'     => 'required|string|max:100',
            'position'    => 'nullable|string|max:100',
            'type'        => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'start_year'  => 'nullable|integer|min:1900|max:' . date('Y'),
            'end_year'    => 'nullable|integer|min:1900|max:' . date('Y'),
            'is_current'  => 'nullable|boolean',
        ]);

        $data['is_current'] = $request->boolean('is_current');
        $portfolio_experience->update($data);

        return back()->with('experience_success', 'Experience diperbarui');
    }

    public function destroy(PortfolioExperience $portfolio_experience)
    {
        $portfolio_experience->delete();
        return back()->with('experience_success', 'Experience dihapus');
    }
}
