@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-20">
    {{-- HERO / INTRO --}}
    <section class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8">
        <div class="grid md:grid-cols-2 gap-10 items-center">
            {{-- Text --}}
            <div class="space-y-4">
                @if ($profile)
                    <p>Hai, namaku</p>
                    <h1 class="text-3xl sm:text-4xl font-semibold tracking-tight">
                        {{ $profile->name }}
                    </h1>
                    <p class="text-gray-700 text-lg">
                        {{ $profile->headline }}
                    </p>
                    <p class="text-sm text-gray-500">
                        @php
                            $address = $profile->address;
                            $addressParts = $address ? array_filter([
                                $address->kecamatan,
                                $address->kabupaten_kota,
                                $address->provinsi,
                            ]) : [];
                        @endphp
                        {{ $addressParts ? implode(', ', $addressParts) : '-' }}
                    </p>
                @else
                    <p class="text-gray-500">Profile belum diatur</p>
                @endif

                {{-- Tombol CV --}}
                <div class="flex gap-3">
                    @if ($profile && $profile->cv)
                        <a href="{{ asset('storage/' . $profile->cv) }}"
                           target="_blank"
                           class="inline-flex items-center px-5 py-2.5 text-sm font-medium border border-gray-300 rounded-lg hover:bg-gray-50">
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
                    <div class="w-64 h-64 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No Photo</span>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- ABOUT --}}
    <section class="max-w-3xl">
        <h2 class="text-2xl font-semibold tracking-tight mb-4">Tentang Saya</h2>
        @if ($profile)
            <p class="text-gray-700">{{ $profile->about }}</p><br>
        @else
            <p class="text-gray-500">Profile belum diatur</p><br>
        @endif
    </section>

    {{-- SKILLS --}}
    <section>
        <h2 class="text-2xl font-semibold tracking-tight mb-4">Skills</h2>
        <div class="flex flex-wrap gap-2">
            @forelse ($skills as $skill)
                <span class="px-3 py-1.5 text-sm bg-gray-100 border border-gray-200 rounded-full">
                    {{ $skill->name }}
                </span>
            @empty
                <p class="text-gray-500">Skill belum ditambahkan</p><br>
            @endforelse
        </div>
    </section>

    {{-- EDUCATION --}}
    <section>
        <h2 class="text-2xl font-semibold tracking-tight mb-4">Education</h2>
        <div class="space-y-4">
            @forelse ($educations as $edu)
                <div class="bg-white border border-gray-200 rounded-xl p-4">
                    <h3 class="font-semibold text-lg">
                        {{ $edu->school }}
                    </h3>
                    <p class="text-sm text-gray-600">
                        {{ $edu->degree }}
                        @if ($edu->field)
                            - {{ $edu->field }}
                        @endif
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $edu->start_year }} - {{ $edu->is_current ? 'Sekarang' : $edu->end_year }}
                    </p>
                </div>
            @empty
                <p class="text-gray-500">Education belum ditambahkan</p>
            @endforelse
        </div>
    </section>

    {{-- EXPERIENCE --}}
    <section>
        <h2 class="text-2xl font-semibold tracking-tight mb-4">Experience</h2>
        <div class="space-y-4">
            @forelse ($experiences as $exp)
                <div class="bg-white border border-gray-200 rounded-xl p-4">
                    <h3 class="font-semibold text-lg">
                        {{ $exp->position ?? '-' }}
                    </h3>
                    <p class="text-sm text-gray-600">
                        {{ $exp->company }}
                        @if ($exp->type)
                            - {{ $exp->type }}
                        @endif
                    </p>
                    <p class="text-sm text-gray-500 mb-2">
                        {{ $exp->start_year }} - {{ $exp->is_current ? 'Sekarang' : $exp->end_year }}
                    </p>
                    @if ($exp->description)
                        <p class="text-gray-600 text-sm">
                            {{ $exp->description }}
                        </p>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">Experience belum ditambahkan</p>
            @endforelse
        </div>
    </section>

    {{-- LANGUAGES --}}
    <section>
        <h2 class="text-2xl font-semibold tracking-tight mb-4">Languages</h2>
        <div class="flex flex-wrap gap-2">
            @forelse ($languages as $lang)
                <span class="px-3 py-1.5 text-sm bg-gray-100 border border-gray-200 rounded-full">
                    {{ $lang->name }}
                    @if($lang->level)
                        - {{ $lang->level }}
                    @endif
                </span>
            @empty
                <p class="text-gray-500">Belum ada language</p>
            @endforelse
        </div>
    </section>

    {{-- HOBBY --}}
    <section>
        <h2 class="text-2xl font-semibold tracking-tight mb-4">Hobbies</h2>
        <div class="flex flex-wrap gap-2">
            @forelse ($hobbies as $hobby)
                <span class="px-3 py-1.5 text-sm bg-gray-100 border border-gray-200 rounded-full">
                    {{ $hobby->name }}
                </span>
            @empty
                <p class="text-gray-500">Belum ada hobby</p>
            @endforelse
        </div>
    </section>

    {{-- CONTACT CTA --}}
    <section class="bg-white border border-gray-200 rounded-2xl p-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <a href="{{ route('contact.index') }}" class="inline-flex items-center px-6 py-3 bg-black text-black rounded-lg hover:bg-gray-900 transition">
        <div>
            <h2 class="text-2xl font-semibold tracking-tight">Contact Me</h2>
            <p class="text-gray-600 text-sm mt-1">Saya senang berdiskusi untuk kolaborasi.</p>
        </div>
        </a>
    </section>

    {{-- POSTS (KECIL AJA) --}}
    <section id="posts">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold tracking-tight">Post Terbaru</h2>
            <a href="{{ route('posts.index') }}"
               class="text-sm text-blue-600 hover:underline">
                Lihat semua ->
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse ($posts->take(3) as $post)
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
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
                            Baca ->
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada tulisan.</p>
            @endforelse
        </div>
    </section>
</div>

@endsection
