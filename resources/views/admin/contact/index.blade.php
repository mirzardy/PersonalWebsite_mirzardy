@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Contact & Links</h1>

{{-- CONTACT --}}
<h2 class="text-xl font-bold mb-4">Contact</h2>

@if(session('success'))
<div class="mb-4 text-green-600">{{ session('success') }}</div>
@endif

<form action="{{ route('admin.contacts.update') }}"
      method="POST"
      class="space-y-4 max-w-xl">
    @csrf
    @method('PUT')

    <div>
        <label>Email</label>
        <input name="email"
               value="{{ old('email', $contact->email ?? '') }}"
               class="w-full border rounded p-2">
    </div>

    <div>
        <label>Phone</label>
        <input name="phone"
               value="{{ old('phone', $contact->phone ?? '') }}"
               class="w-full border rounded p-2">
    </div>

    <div>
        <label>WhatsApp</label>
        <input name="whatsapp"
               value="{{ old('whatsapp', $contact->whatsapp ?? '') }}"
               class="w-full border rounded p-2">
    </div>

    <div>
        <label>Telegram</label>
        <input name="telegram"
               value="{{ old('telegram', $contact->telegram ?? '') }}"
               class="w-full border rounded p-2">
    </div>

    <button class="px-5 py-2 bg-blue-600 text-black rounded">
        Simpan Contact
    </button>
</form>

<hr class="my-12">

{{-- LINKS --}}
<h2 class="text-xl font-bold mb-4">Links</h2>

@if(session('link_success'))
<div class="mb-4 text-green-600">{{ session('link_success') }}</div>
@endif

{{-- CREATE LINK --}}
<form action="{{ route('admin.links.store') }}"
      method="POST"
      class="flex gap-3 mb-6 max-w-xl">
    @csrf

    <input name="name"
           placeholder="Nama (GitHub, LinkedIn)"
           class="border rounded p-2 flex-1"
           required>

    <input name="url"
           placeholder="https://..."
           class="border rounded p-2 flex-1"
           required>

    <button class="px-4 py-2 bg-green-600 text-black rounded">
        Tambah
    </button>
</form>

{{-- LIST LINK --}}
<div class="space-y-3 max-w-xl">
@forelse($links as $link)
<div class="flex gap-2 items-center">

    {{-- UPDATE --}}
    <form action="{{ route('admin.links.update', $link) }}"
          method="POST"
          class="flex gap-2 flex-1">
        @csrf
        @method('PUT')

        <input name="name"
               value="{{ $link->name }}"
               class="border rounded p-2 flex-1">

        <input name="url"
               value="{{ $link->url }}"
               class="border rounded p-2 flex-1">

        <button class="text-blue-600 text-sm">
            Update
        </button>
    </form>

    {{-- DELETE --}}
    <form action="{{ route('admin.links.destroy', $link) }}"
          method="POST"
          onsubmit="return confirm('Hapus link ini?')">
        @csrf
        @method('DELETE')

        <button class="text-red-600 text-sm">
            Hapus
        </button>
    </form>

</div>
@empty
<p class="text-gray-500">Belum ada link.</p>
@endforelse
</div>

@endsection
