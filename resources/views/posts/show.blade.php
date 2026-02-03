@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-8">

    <div class="bg-white p-6 rounded shadow">

        {{-- Image --}}
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}"
                 class="w-full h-72 object-cover rounded mb-6"
                 alt="{{ $post->title }}">
        @endif

        {{-- Title --}}
        <h1 class="text-3xl font-bold mb-2">
            {{ $post->title }}
        </h1>

        {{-- Date --}}
        <p class="text-sm text-gray-500 mb-6">
            Diposting: {{ $post->created_at->format('d M Y') }}

            @if ($post->updated_at->gt($post->created_at))
                <span class="italic text-gray-400">
                    • Diupdate: {{ $post->updated_at->format('d M Y') }}
                </span>
            @endif
        </p>

        {{-- Content --}}
        <div class="prose max-w-none text-gray-800">
            {!! nl2br(e($post->content)) !!}
        </div>

    </div>

</div>
@endsection
