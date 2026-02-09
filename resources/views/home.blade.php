@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-20">
    {{-- HERO / INTRO --}}
    <section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 rounded-3xl shadow-2xl p-8 md:p-12 overflow-hidden">
        {{-- Decorative elements --}}
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-purple-500/10 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>

        <div class="relative grid md:grid-cols-2 gap-10 items-center">
            {{-- Text --}}
            <div class="space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 rounded-full backdrop-blur-sm">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    <span class="text-sm text-gray-300">Available for work</span>
                </div>

                @if ($profile)
                    <p class="text-gray-400 text-sm uppercase tracking-wider">Hai, namaku</p>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-black tracking-tight leading-tight">
                        {{ $profile->name }}
                    </h1>
                    <p class="text-xl md:text-2xl text-gray-300 font-light">
                        {{ $profile->headline }}
                    </p>
                    <p class="flex items-center gap-2 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        @php
                            $address = $profile->address;
                            $addressParts = $address ? array_filter([
                                $address->kecamatan,
                                $address->kabupaten_kota,
                                $address->provinsi,
                            ]) : [];
                        @endphp
                        {{ $addressParts ? implode(', ', $addressParts) : 'Location not set' }}
                    </p>

                    {{-- Tombol CV --}}
                    <div class="flex gap-4 pt-4">
                        @if ($profile && $profile->cv)
                            <a href="{{ asset('storage/' . $profile->cv) }}"
                               target="_blank"
                               class="inline-flex items-center gap-2 px-6 py-3 bg-white text-gray-900 font-semibold rounded-xl hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Download CV
                            </a>
                        @endif
                        <a href="{{ route('contact.index') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-transparent border-2 border-white/30 text-white font-semibold rounded-xl hover:bg-white/10 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Contact Me
                        </a>
                    </div>
                @else
                    <p class="text-gray-500">Profile belum diatur</p>
                @endif
            </div>

            {{-- Image / Avatar --}}
            <div class="flex justify-center">
                @if ($profile && $profile->photo)
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-tr from-blue-500 to-purple-500 rounded-full blur-2xl opacity-30"></div>
                        <img src="{{ asset('storage/' . $profile->photo) }}"
                             class="relative w-72 h-72 md:w-80 md:h-80 object-cover rounded-full shadow-2xl ring-4 ring-white/10"
                             alt="{{ $profile->name }}">
                    </div>
                @else
                    <div class="w-72 h-72 md:w-80 md:h-80 rounded-full bg-gradient-to-br from-gray-700 to-gray-800 border border-gray-600 flex items-center justify-center">
                        <span class="text-gray-400 text-lg">No Photo</span>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- ABOUT --}}
    <section class="max-w-4xl">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-900">Tentang Saya</h2>
        </div>
        @if ($profile)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-8">
                <p class="text-gray-700 text-lg leading-relaxed">{{ $profile->about }}</p>
            </div>
        @else
            <div class="bg-gray-50 rounded-2xl border border-gray-200 p-8">
                <p class="text-gray-500">Profile belum diatur</p>
            </div>
        @endif
    </section>

    {{-- SKILLS --}}
    <section>
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-900">Skills</h2>
        </div>
        <div class="flex flex-wrap gap-3">
            @forelse ($skills as $skill)
                <span class="px-4 py-2 bg-gradient-to-r from-gray-50 to-gray-100 border border-gray-200 rounded-xl text-gray-700 font-medium hover:from-blue-50 hover:to-blue-100 hover:border-blue-200 hover:text-blue-700 transition-all duration-300 shadow-sm hover:shadow-md">
                    {{ $skill->name }}
                </span>
            @empty
                <div class="bg-gray-50 rounded-xl border border-gray-200 p-6">
                    <p class="text-gray-500">Skill belum ditambahkan</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- EDUCATION & EXPERIENCE --}}
    <div class="grid md:grid-cols-2 gap-10">
        {{-- EDUCATION --}}
        <section>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Education</h2>
            </div>
            <div class="space-y-4">
                @forelse ($educations as $edu)
                    <div class="bg-white rounded-xl border border-gray-100 shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <h3 class="font-bold text-lg text-gray-900">
                            {{ $edu->school }}
                        </h3>
                        <p class="text-gray-600 mt-1">
                            {{ $edu->degree }}
                            @if ($edu->field)
                                <span class="text-gray-400">-</span> {{ $edu->field }}
                            @endif
                        </p>
                        <div class="flex items-center gap-2 mt-3 text-sm text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $edu->start_year }} - {{ $edu->is_current ? 'Sekarang' : $edu->end_year }}
                        </div>
                    </div>
                @empty
                    <div class="bg-gray-50 rounded-xl border border-gray-200 p-6">
                        <p class="text-gray-500">Education belum ditambahkan</p>
                    </div>
                @endforelse
            </div>
        </section>

        {{-- EXPERIENCE --}}
        <section>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-gradient-to-br from-rose-500 to-rose-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Experience</h2>
            </div>
            <div class="space-y-4">
                @forelse ($experiences as $exp)
                    <div class="bg-white rounded-xl border border-gray-100 shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <h3 class="font-bold text-lg text-gray-900">
                            {{ $exp->position ?? '-' }}
                        </h3>
                        <p class="text-gray-600 mt-1">
                            {{ $exp->company }}
                            @if ($exp->type)
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ml-2">
                                    {{ $exp->type }}
                                </span>
                            @endif
                        </p>
                        <div class="flex items-center gap-2 mt-3 text-sm text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $exp->start_year }} - {{ $exp->is_current ? 'Sekarang' : $exp->end_year }}
                        </div>
                        @if ($exp->description)
                            <p class="text-gray-600 text-sm mt-4 pt-4 border-t border-gray-100">
                                {{ $exp->description }}
                            </p>
                        @endif
                    </div>
                @empty
                    <div class="bg-gray-50 rounded-xl border border-gray-200 p-6">
                        <p class="text-gray-500">Experience belum ditambahkan</p>
                    </div>
                @endforelse
            </div>
        </section>
    </div>

    {{-- LANGUAGES & HOBBY --}}
    <div class="grid md:grid-cols-2 gap-10">
        {{-- LANGUAGES --}}
        <section>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-violet-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Languages</h2>
            </div>
            <div class="flex flex-wrap gap-3">
                @forelse ($languages as $lang)
                    <div class="px-4 py-2 bg-gradient-to-r from-violet-50 to-violet-100 border border-violet-200 rounded-xl text-violet-700 font-medium flex items-center gap-2">
                        <span>{{ $lang->name }}</span>
                        @if($lang->level)
                            <span class="px-2 py-0.5 bg-violet-200 rounded-full text-xs">{{ $lang->level }}</span>
                        @endif
                    </div>
                @empty
                    <div class="bg-gray-50 rounded-xl border border-gray-200 p-6">
                        <p class="text-gray-500">Belum ada language</p>
                    </div>
                @endforelse
            </div>
        </section>

        {{-- HOBBY --}}
        <section>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Hobbies</h2>
            </div>
            <div class="flex flex-wrap gap-3">
                @forelse ($hobbies as $hobby)
                    <span class="px-4 py-2 bg-gradient-to-r from-pink-50 to-pink-100 border border-pink-200 rounded-xl text-pink-700 font-medium flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                        {{ $hobby->name }}
                    </span>
                @empty
                    <div class="bg-gray-50 rounded-xl border border-gray-200 p-6">
                        <p class="text-gray-500">Belum ada hobby</p>
                    </div>
                @endforelse
            </div>
        </section>
    </div>

    {{-- POSTS PREVIEW --}}
    <section id="posts">
        <div class="flex items-center gap-3 mb-8">
            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-900">Latest Posts</h2>
        </div>

        @if($posts->count() > 0)
            <div class="grid md:grid-cols-3 gap-6">
                @foreach ($posts->take(3) as $post)
                    <a href="{{ route('posts.show', $post->slug) }}" class="group bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                        @if ($post->image)
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $post->image) }}"
                                     class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300"
                                     alt="{{ $post->title }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                        @endif

                        <div class="p-6 space-y-3">
                            <div class="flex items-center gap-2 text-sm text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $post->created_at->format('d M Y') }}
                            </div>
                            <h3 class="font-bold text-lg text-gray-900 group-hover:text-indigo-600 transition-colors">
                                {{ $post->title }}
                            </h3>
                            <p class="text-gray-600 text-sm line-clamp-2">
                                {{ $post->excerpt }}
                            </p>
                            <div class="flex items-center text-indigo-600 font-medium text-sm group-hover:gap-2 transition-all">
                                Baca selengkapnya
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            @if($posts->count() > 3)
                <div class="mt-8 text-center">
                    <a href="{{ route('posts.index') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-gray-900 text-white font-semibold rounded-xl hover:bg-gray-800 transition-all duration-300 shadow-lg hover:shadow-xl">
                        Lihat Semua Post
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            @endif
        @else
            <div class="bg-gray-50 rounded-2xl border border-gray-200 p-12 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                <p class="text-gray-500">Belum ada post.</p>
            </div>
        @endif
    </section>

    {{-- CONTACT CTA --}}
    <section class="relative bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 rounded-3xl shadow-2xl p-8 md:p-12 overflow-hidden">
        {{-- Decorative elements --}}
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>

        <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-2">Mari Berdiskusi</h2>
                <p class="text-white/80 text-lg">Saya senang berkolaborasi dan berbagi pengalaman.</p>
            </div>
            <a href="{{ route('contact.index') }}"
               class="inline-flex items-center gap-3 px-8 py-4 bg-white text-indigo-600 font-bold rounded-xl hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 whitespace-nowrap">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Hubungi Saya
            </a>
        </div>
    </section>
</div>
@endsection
