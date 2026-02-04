@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Latest Posts</h1>

<div class="grid md:grid-cols-2 gap-6">
    @forelse ($posts as $post)
        <div class="bg-white rounded shadow overflow-hidden">

            {{-- Image --}}
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}"
                     class="w-full h-48 object-cover"
                     alt="{{ $post->title }}">
            @endif

            <div class="p-4 space-y-2">
                <h2 class="text-lg font-semibold">
                    {{ $post->title }}
                </h2>

                <p class="text-sm text-gray-500">
                    Diposting: {{ $post->created_at->format('d M Y') }}

                    {{-- TAMPILKAN UPDATE JIKA ADA --}}
                    @if ($post->updated_at->gt($post->created_at))
                        <span class="italic text-gray-400">
                            • Diupdate: {{ $post->updated_at->format('d M Y') }}
                        </span>
                    @endif
                </p>

                <p class="text-gray-700 text-sm">
                    {{ $post->excerpt }}
                </p>

                <a href="{{ route('posts.show', $post->slug) }}"
                   class="inline-block text-sm text-blue-600 hover:underline">
                    Baca selengkapnya →
                </a>
            </div>
        </div>
    @empty
        <p class="text-gray-500">Belum ada post.</p>
    @endforelse
</div>
@endsection
