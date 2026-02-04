@extends('layouts.app')

@section('content')

{{-- HERO / INTRO --}}
<section class="min-h-[70vh] flex items-center">
    <div class="grid md:grid-cols-2 gap-10 items-center">

        {{-- Text --}}
        <div class="space-y-5">
            @if ($profile)
                <h1>{{ $profile->name }}</h1>
                <p>{{ $profile->headline }}</p>
                <p class="text-sm text-gray-500">
                    {{ $profile->address }}
                </p>
            @else
                <p class="text-gray-500">Profile belum diatur</p>
            @endif

            {{-- Tombol CV --}}
            <div class="flex gap-4">
                @if ($profile && $profile->cv)
                    <a href="{{ asset('storage/' . $profile->cv) }}"
                    target="_blank"
                    class="px-5 py-2 border border-gray-300 rounded hover:bg-gray-100">
                        Download & Lihat CV
                    </a>
                @endif
            </div>
        </div>

        {{-- Image / Avatar --}}
        <div class="flex justify-center">
            @if ($profile && $profile->photo)
                <img src="{{ asset('storage/' . $profile->photo) }}"
                    class="w-64 h-64 object-cover rounded-full shadow"
                    alt="{{ $profile->name }}">
            @else
                <div class="w-64 h-64 rounded-full bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500">No Photo</span>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- ABOUT --}}
<section class="mt-20 max-w-3xl">
    <h2 class="text-2xl font-bold mb-4">Tentang Saya</h2>
    @if ($profile)
        <p>{{ $profile->about }}</p>
    @else
        <p class="text-gray-500">Profile belum diatur</p>
    @endif
</section>

{{-- SKILLS --}}
<section class="mt-16">
    <h2 class="text-2xl font-bold mb-6">Skills</h2>

    <div class="flex flex-wrap gap-3">
        @forelse ($skills as $skill)
            <span class="px-4 py-2 bg-gray-100 rounded">
                {{ $skill->name }}
            </span>
        @empty
            <p class="text-gray-500">Skill belum ditambahkan</p>
        @endforelse
    </div>
</section>

{{-- POSTS (KECIL AJA) --}}
<section id="posts" class="mt-20">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Tulisan Terbaru</h2>
        <a href="{{ route('posts.index') }}"
           class="text-sm text-blue-600 hover:underline">
            Lihat semua →
        </a>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        @forelse ($posts->take(3) as $post)
            <div class="bg-white rounded shadow overflow-hidden">

                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}"
                         class="w-full h-36 object-cover"
                         alt="{{ $post->title }}">
                @endif

                <div class="p-4 space-y-2">
                    <h3 class="font-semibold text-lg">
                        {{ $post->title }}
                    </h3>

                    <p class="text-sm text-gray-500">
                        {{ $post->created_at->format('d M Y') }}
                    </p>

                    <p class="text-sm text-gray-600">
                        {{ $post->excerpt }}
                    </p>

                    <a href="{{ route('posts.show', $post->slug) }}"
                       class="text-sm text-blue-600 hover:underline">
                        Baca →
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada tulisan.</p>
        @endforelse
    </div>
</section>

@endsection
