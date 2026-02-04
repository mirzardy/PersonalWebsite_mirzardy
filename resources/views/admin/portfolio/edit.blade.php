@extends('admin.layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Profile / About Me</h1>

@if (session('success'))
    <div class="mb-4 text-green-600">{{ session('success') }}</div>
@endif

<form action="{{ route('admin.portfolio.update') }}" method="POST" enctype="multipart/form-data"
      class="space-y-5 max-w-xl">
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1">Nama</label>
        <input type="text" name="name"
               value="{{ old('name', $profile->name) }}"
               class="w-full border rounded p-2">
    </div>

    <div>
        <label class="block mb-1">Headline</label>
        <input type="text" name="headline"
               value="{{ old('headline', $profile->headline) }}"
               class="w-full border rounded p-2">
    </div>

    <div>
        <label class="block mb-1">About Me</label>
        <textarea name="about" rows="6"
                  class="w-full border rounded p-2">{{ old('about', $profile->about) }}</textarea>
    </div>

    <div>
        <label class="block mb-1">Alamat</label>
        <textarea name="address" rows="6"
                  class="w-full border rounded p-2">{{ old('address', $profile->address) }}</textarea>
    </div>

    <div>
        <label class="block mb-1">Foto</label>
        <input type="file" name="photo">
    </div>

    <div>
        <label class="block mb-1">CV (PDF)</label>
        <input type="file" name="cv">
    </div>

    <button class="px-5 py-2 bg-blue-600 text-black rounded">
        Simpan
    </button>
</form>

<hr class="my-10">
<h2 class="text-xl font-bold mb-4">Skills</h2>
@if (session('skill_success'))
    <div class="mb-4 text-green-600">{{ session('skill_success') }}</div>
@endif

{{-- FORM TAMBAH SKILL --}}
<form action="{{ route('admin.portfolio-skills.store') }}" method="POST"
      class="flex gap-3 mb-6 max-w-xl">
    @csrf
    <input type="text" name="name" placeholder="Nama skill"
           class="border rounded p-2 flex-1" required>

    <input type="number" name="level" placeholder="Level %"
           class="border rounded p-2 w-28">

    <button class="px-4 py-2 bg-green-600 text-white rounded">
        Tambah
    </button>
</form>

{{-- LIST SKILL --}}
<div class="space-y-3 max-w-xl">
@forelse ($skills as $skill)
    <div class="flex items-center gap-2">
        {{-- UPDATE --}}
        <form action="{{ route('admin.portfolio-skills.update', $skill) }}"
              method="POST" class="flex gap-2 flex-1">
            @csrf
            @method('PUT')

            <input type="text" name="name"
                   value="{{ $skill->name }}"
                   class="border rounded p-2 flex-1">

            <input type="number" name="level"
                   value="{{ $skill->level }}"
                   class="border rounded p-2 w-24">

            <button class="text-blue-600 text-sm">
                Update
            </button>
        </form>

        {{-- DELETE --}}
        <form action="{{ route('admin.portfolio-skills.destroy', $skill) }}"
              method="POST"
              onsubmit="return confirm('Hapus skill ini?')">
            @csrf
            @method('DELETE')
            <button class="text-red-600 text-sm">
                Hapus
            </button>
        </form>
    </div>
@empty
    <p class="text-gray-500">Belum ada skill.</p>
@endforelse
</div>

@endsection
