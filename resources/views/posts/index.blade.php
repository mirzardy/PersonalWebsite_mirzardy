@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    {{-- Header --}}
    <div class="text-center mb-12">
        <div class="inline-flex items-center gap-3 px-4 py-2 bg-indigo-100 rounded-full mb-4">
            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
            </svg>
            <span class="text-indigo-700 font-medium">Blog & Artikel</span>
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 tracking-tight mb-4">
            Latest Posts
        </h1>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto">
            Kumpulan tulisan terbaru tentang teknologi, programming, dan pengalaman saya.
        </p>
    </div>

    @forelse ($posts as $post)
        <a href="{{ route('posts.show', $post->slug) }}"
           class="group block bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden mb-6 hover:shadow- duration-300 transform hover:-translate-y2xl transition-all-1">
            <div class="grid md:grid-cols-3 gap-0">
                {{-- Image --}}
                @if ($post->image)
                    <div class="md:col-span-1 relative overflow-hidden">
                        <img src="{{ asset('storage/' . $post->image) }}"
                             class="w-full h-full min-h-[200px] md:min-h-[250px] object-cover transform group-hover:scale-105 transition-transform duration-500"
                             alt="{{ $post->title }}">
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent to-black/20 md:hidden"></div>
                    </div>
                @endif

                {{-- Content --}}
                <div class="md:col-span-2 p-6 md:p-8 flex flex-col justify-center">
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $post->created_at->format('d M Y') }}
                        </div>

                        {{-- TAMPILKAN UPDATE JIKA ADA --}}
                        @if ($post->updated_at->gt($post->created_at))
                            <span class="flex items-center gap-1 text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                {{ $post->updated_at->format('d M Y') }}
                            </span>
                        @endif

                        {{-- Reading time --}}
                        <span class="flex items-center gap-1 text-indigo-600 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ ceil(strlen(strip_tags($post->content)) / 500) }} min read
                        </span>
                    </div>

                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors">
                        {{ $post->title }}
                    </h2>

                    <p class="text-gray-600 text-lg leading-relaxed mb-4 line-clamp-2">
                        {{ $post->excerpt }}
                    </p>

                    <div class="flex items-center text-indigo-600 font-semibold group-hover:gap-3 transition-all">
                        <span>Baca selengkapnya</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </a>
    @empty
        <div class="text-center py-20">
            <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum ada post</h3>
            <p class="text-gray-500">Silakan kembali lagi nanti untuk melihat artikel baru.</p>
        </div>
    @endforelse

    {{-- Pagination --}}
    @if (method_exists($posts, 'hasPages') && $posts->hasPages())
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection
