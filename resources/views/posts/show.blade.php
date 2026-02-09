@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    {{-- Back Button --}}
    <a href="{{ route('posts.index') }}"
       class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-900 transition-colors mb-8 group">
        <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span>Kembali ke daftar post</span>
    </a>

    <article class="bg-white rounded-3xl shadow-xl overflow-hidden">
        {{-- Hero Image --}}
        @if ($post->image)
            <div class="relative h-[300px] md:h-[400px] overflow-hidden">
                <img src="{{ asset('storage/' . $post->image) }}"
                     class="w-full h-full object-cover"
                     alt="{{ $post->title }}">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8">
                    <div class="flex items-center gap-4 text-sm text-white/80 mb-4">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $post->created_at->format('d M Y') }}
                        </span>

                        {{-- TAMPILKAN UPDATE JIKA ADA --}}
                        @if ($post->updated_at->gt($post->created_at))
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                Diupdate: {{ $post->updated_at->format('d M Y') }}
                            </span>
                        @endif

                        {{-- Reading time --}}
                        <span class="flex items-center gap-1 text-white/90">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ ceil(strlen(strip_tags($post->content)) / 500) }} min read
                        </span>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 md:px-8 py-8">
                <div class="flex items-center gap-4 text-sm text-white/80 mb-4">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $post->created_at->format('d M Y') }}
                    </span>

                    {{-- TAMPILKAN UPDATE JIKA ADA --}}
                    @if ($post->updated_at->gt($post->created_at))
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Diupdate: {{ $post->updated_at->format('d M Y') }}
                        </span>
                    @endif
                </div>
            </div>
        @endif

        {{-- Title & Content --}}
        <div class="p-6 md:p-10">
            {{-- Title --}}
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-8 leading-tight">
                {{ $post->title }}
            </h1>
            <p><br></p>

            {{-- Content --}}
            <div class="prose prose-lg prose-indigo max-w-none text-gray-800">
                {!! nl2br(e($post->content)) !!}
            </div>

            {{-- Share section --}}
            <div class="mt-12 pt-8 border-t border-gray-100">
                <p class="text-sm text-gray-500 mb-4">Bagikan artikel ini:</p>
                <div class="flex gap-3">
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ url()->current() }}"
                       target="_blank"
                       class="p-3 bg-gray-100 rounded-full hover:bg-blue-100 hover:text-blue-600 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ urlencode($post->title) }}"
                       target="_blank"
                       class="p-3 bg-gray-100 rounded-full hover:bg-blue-100 hover:text-blue-700 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                       target="_blank"
                       class="p-3 bg-gray-100 rounded-full hover:bg-blue-100 hover:text-blue-700 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </article>

    {{-- Related Posts (placeholder) --}}
    <div class="mt-12">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Artikel Lainnya</h3>
        <a href="{{ route('posts.index') }}"
           class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 text-black font-semibold rounded-xl hover:bg-indigo-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
            </svg>
            Lihat Semua Post
        </a>
    </div>
</div>
@endsection
