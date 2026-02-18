<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio\PortfolioLanguage;

class PortfolioLanguageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'level' => 'nullable|string|max:50',
        ]);

        $data['order'] = PortfolioLanguage::max('order') + 1;

        PortfolioLanguage::create($data);

        return back()->with('language_success', 'Language ditambahkan');
    }

    public function update(Request $request, PortfolioLanguage $portfolio_language)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'level' => 'nullable|string|max:50',
        ]);

        $portfolio_language->update($data);

        return back()->with('language_success', 'Language diperbarui');
    }

    public function destroy(PortfolioLanguage $portfolio_language)
    {
        $portfolio_language->delete();

        return back()->with('language_success', 'Language dihapus');
    }
}
