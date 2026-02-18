@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-8">
        <a href="{{ route('projects.index') }}" class="hover:text-indigo-600 transition-colors">Projects</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="text-gray-900 font-medium">{{ $category->name }}</span>
    </nav>

    {{-- Header --}}
    <section class="mb-12">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-16 h-16 rounded-2xl flex items-center justify-center"
                 style="background-color: {{ $category->color }}20;">
                <span class="w-8 h-8 rounded-full" style="background-color: {{ $category->color }}"></span>
            </div>
            <div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900">{{ $category->name }}</h1>
                <p class="text-gray-600 mt-1">{{ $posts->count() }} {{ Str::plural('project', $posts->count()) }}</p>
            </div>
        </div>

        @if($category->description)
            <p class="text-xl text-gray-600 max-w-2xl">
                {{ $category->description }}
            </p>
        @endif
    </section>

    {{-- Projects Grid --}}
    @if($posts->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <a href="{{ route('posts.show', $post->slug) }}"
                   class="group bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
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
                            View Project
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="bg-gray-50 rounded-2xl border border-gray-200 p-12 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="text-gray-500 text-lg">No projects in this category yet.</p>
            <p class="text-gray-400 mt-2">Check back later for new {{ $category->name }} projects!</p>
        </div>
    @endif
</div>
@endsection
