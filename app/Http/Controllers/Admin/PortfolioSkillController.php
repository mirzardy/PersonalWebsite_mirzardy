<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio\PortfolioSkill;

class PortfolioSkillController extends Controller
{
    public function index()
    {
        $skills = PortfolioSkill::orderBy('order')->get();
        return view('admin.portfolio.skills.index', compact('skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'level' => 'nullable|integer|min:1|max:100',
        ]);

        PortfolioSkill::create($request->only([
            'name',
            'level',
        ]));

        return back()->with('success', 'Skill ditambahkan');
    }

    public function update(Request $request, PortfolioSkill $portfolio_skill)
    {
        $portfolio_skill->update(
            $request->only(['name', 'level'])
        );

        return back()->with('success', 'Skill diperbarui');
    }

    public function destroy(PortfolioSkill $portfolio_skill)
    {
        $portfolio_skill->delete();

        return back()->with('success', 'Skill dihapus');
    }
}
