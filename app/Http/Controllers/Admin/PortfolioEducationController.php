<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio\PortfolioEducation;

class PortfolioEducationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'school'      => 'required|string|max:100',
            'degree'      => 'nullable|string|max:50',
            'field'       => 'nullable|string|max:100',
            'start_year'  => 'nullable|integer|min:1900|max:'.date('Y'),
            'end_year'    => 'nullable|integer|min:1900|max:'.date('Y'),
            'is_current'  => 'nullable|boolean',
        ], [
            'start_year.min' => 'Tahun mulai tidak valid',
            'start_year.max' => 'Tahun mulai tidak boleh melebihi tahun sekarang',
            'end_year.min' => 'Tahun selesai tidak valid',
            'end_year.max' => 'Tahun selesai tidak boleh melebihi tahun sekarang',
        ]);

        $data['is_current'] = $request->boolean('is_current');

        if ($data['is_current']) {
            $data['end_year'] = null;
        }

        $data['order'] = PortfolioEducation::max('order') + 1;

        PortfolioEducation::create($data);

        return back()->with('education_success', 'Education ditambahkan');
    }

    public function update(Request $request, PortfolioEducation $portfolio_education)
    {
        $data = $request->validate([
            'school'      => 'required|string|max:100',
            'degree'      => 'nullable|string|max:50',
            'field'       => 'nullable|string|max:100',
            'start_year'  => 'nullable|integer|min:1900|max:' . date('Y'),
            'end_year'    => 'nullable|integer|min:1900|max:' . date('Y'),
            'is_current'  => 'nullable|boolean',
        ], [
            'start_year.min' => 'Tahun mulai tidak valid',
            'start_year.max' => 'Tahun mulai tidak boleh melebihi tahun sekarang',
            'end_year.min' => 'Tahun selesai tidak valid',
            'end_year.max' => 'Tahun selesai tidak boleh melebihi tahun sekarang',
        ]);

        $data['is_current'] = $request->boolean('is_current');

        if ($data['is_current']) {
            $data['end_year'] = null;
        }

        $portfolio_education->update($data);

        return back()->with('education_success', 'Education diperbarui');
    }

    public function destroy(PortfolioEducation $portfolio_education)
    {
        $portfolio_education->delete();

        return back()->with('education_success', 'Education dihapus');
    }
}
