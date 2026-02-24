@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    {{-- Header --}}
    <section class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">My Projects</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Ini adalah kumpulan project yang sudah atau sedang saya kerjakan, meliputi laravel, web developing, tutorial, dan lainnya.
        </p>
    </section>

    {{-- Categories Grid --}}
    @if($categories->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <a href="{{ route('projects.show', $category->slug) }}"
                   class="group bg-white rounded-2xl border border-gray-100 shadow-lg p-6 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center"
                             style="background-color: {{ $category->color }}20;">
                            <span class="w-6 h-6 rounded-full" style="background-color: {{ $category->color }}"></span>
                        </div>
                        <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm font-medium rounded-full">
                            {{ $category->posts_count }} {{ Str::plural('project', $category->posts_count) }}
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors mb-2">
                        {{ $category->name }}
                    </h3>

                    @if($category->description)
                        <p class="text-gray-600 text-sm line-clamp-2">
                            {{ $category->description }}
                        </p>
                    @endif

                    <div class="mt-4 flex items-center text-indigo-600 font-medium text-sm group-hover:gap-2 transition-all">
                        View Projects
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="bg-gray-50 rounded-2xl border border-gray-200 p-12 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
            </svg>
            <p class="text-gray-500 text-lg">No project categories yet.</p>
            <p class="text-gray-400 mt-2">Check back later for my latest projects!</p>
        </div>
    @endif
</div>
@endsection
