<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio\PortfolioHobby;

class PortfolioHobbyController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $data['order'] = PortfolioHobby::max('order') + 1;

        PortfolioHobby::create($data);

        return back()->with('hobby_success', 'Hobby ditambahkan');
    }

    public function update(Request $request, PortfolioHobby $portfolio_hobby)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $portfolio_hobby->update($data);

        return back()->with('hobby_success', 'Hobby diperbarui');
    }

    public function destroy(PortfolioHobby $portfolio_hobby)
    {
        $portfolio_hobby->delete();

        return back()->with('hobby_success', 'Hobby dihapus');
    }
}
