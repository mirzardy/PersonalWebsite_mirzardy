<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact\Contact;
use App\Models\Contact\Link;
use App\Models\Portfolio\PortfolioProfile;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index', [
            'contact' => Contact::first(),
            'links' => Link::all(),
        ]);
    }

    // CONTACT (single row update)
    public function updateContact(Request $request)
    {
        $data = $request->validate([
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:30',
            'whatsapp' => 'nullable|string|max:30',
            'telegram' => 'nullable|string|max:30',
        ]);

        $contact = Contact::firstOrCreate(['id' => 1]);
        $contact->update($data);

        return back()->with('success', 'Contact berhasil diupdate');
    }

    // LINK CREATE
    public function storeLink(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'url' => 'required|url',
        ]);

        Link::create($data);

        return back()->with('link_success', 'Link berhasil ditambah');
    }

    // LINK UPDATE
    public function updateLink(Request $request, Link $link)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'url' => 'required|url',
        ]);

        $link->update($data);

        return back()->with('link_success', 'Link berhasil diupdate');
    }

    // LINK DELETE
    public function destroyLink(Link $link)
    {
        $link->delete();

        return back()->with('link_success', 'Link berhasil dihapus');
    }
}
