@extends('admin.layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-6">Posts</h1>

<a href="/admin/posts/create"
   class="inline-block mb-4 px-4 py-2 bg-black text-white rounded text-sm">
    + New Post
</a>

<div class="space-y-4">
@forelse($posts as $post)
    <div class="bg-white p-4 rounded shadow flex gap-4">

        {{-- Image --}}
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}"
                 class="w-24 h-24 object-cover rounded">
        @endif

        {{-- Content --}}
        <div class="flex-1">
            <h2 class="font-semibold text-lg">
                {{ $post->title }}
            </h2>

            <p class="text-sm text-gray-500">
                {{ $post->created_at->format('d M Y') }}
            </p>

            <p class="text-gray-700 mt-2">
                {{ $post->excerpt }}
            </p>
        </div>

        {{-- Actions --}}
        <div class="flex items-start gap-2">
            <a href="/admin/posts/{{ $post->id }}/edit"
               class="text-sm underline">Edit</a>

            <form method="POST" action="/admin/posts/{{ $post->id }}">
                @csrf
                @method('DELETE')
                <button class="text-sm text-red-600 underline"
                        onclick="return confirm('Delete this post?')">
                    Delete
                </button>
            </form>
        </div>

    </div>
@empty
    <p class="text-gray-500">No posts yet.</p>
@endforelse
</div>
@endsection
