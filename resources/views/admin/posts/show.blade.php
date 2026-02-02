@extends('admin.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">

    <div class="bg-white p-6 rounded shadow">

        {{-- CARD UTAMA --}}
        <div class="flex gap-6 items-start">

            {{-- IMAGE (SAMA KAYAK INDEX) --}}
            <div class="w-48 h-48 flex-shrink-0 overflow-hidden rounded bg-gray-100">
                @if($post->image)
                    <img
                        src="{{ asset('storage/' . $post->image) }}"
                        class="w-full h-full object-cover"
                        alt="{{ $post->title }}">
                @else
                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                        No Image
                    </div>
                @endif
            </div>

            {{-- CONTENT --}}
            <div class="flex-1 flex flex-col">

                <h1 class="text-2xl font-bold mb-1">
                    {{ $post->title }}
                </h1>

                <p class="text-sm text-gray-500 mb-4">
                    {{ $post->created_at->format('d M Y') }}
                </p>

                <div class="prose max-w-none text-gray-800">
                    {{ $post->content }}
                </div>

                {{-- ACTIONS --}}
                <div class="flex gap-4 mt-6 pt-4 border-t">
                    <a href="/admin/posts/{{ $post->id }}/edit"
                       class="px-4 py-2 bg-gray-800 text-white rounded text-sm">
                        Edit
                    </a>

                    <form method="POST" action="/admin/posts/{{ $post->id }}">
                        @csrf
                        @method('DELETE')
                        <button
                            onclick="return confirm('Delete this post?')"
                            class="px-4 py-2 bg-red-600 text-white rounded text-sm">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
