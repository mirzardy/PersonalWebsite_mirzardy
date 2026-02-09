@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <article class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
        {{-- Image --}}
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}"
                 class="w-full h-72 object-cover"
                 alt="{{ $post->title }}">
        @endif

        <div class="p-6 sm:p-8">
            {{-- Title --}}
            <h1 class="text-3xl font-semibold tracking-tight mb-2">
                {{ $post->title }}
            </h1>

            {{-- Date --}}
            <p class="text-sm text-gray-500 mb-6">
                Diposting: {{ $post->created_at->format('d M Y') }}

                @if ($post->updated_at->gt($post->created_at))
                    <span class="italic text-gray-400">
                        - Diupdate: {{ $post->updated_at->format('d M Y') }}
                    </span>
                @endif
            </p>

            {{-- Content --}}
            <div class="prose prose-slate max-w-none text-gray-800">
                {!! nl2br(e($post->content)) !!}
            </div>
        </div>
    </article>
</div>
@endsection
