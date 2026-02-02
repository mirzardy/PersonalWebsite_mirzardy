@extends('admin.layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-6">Posts</h1>

<a href="/admin/posts/create"
   class="inline-block mb-4 px-4 py-2 bg-black text-black rounded text-sm">
    + New Post
</a>

<div class="space-y-4">
@forelse($posts as $post)
<div class="bg-white p-4 rounded shadow flex gap-4 items-start h-40 overflow-hidden hover:bg-gray-50 transition">

    {{-- Image --}}
    <a href="/admin/posts/{{ $post->id }}"
       class="w-48 h-full flex-shrink-0 overflow-hidden rounded block">
        @if($post->image)
            <img
                src="{{ asset('storage/' . $post->image) }}"
                class="w-full h-full object-cover"
                alt="{{ $post->title }}">
        @else
            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">
                No Image
            </div>
        @endif
    </a>

    {{-- Content --}}
    <div class="flex-1 flex flex-col justify-between h-full">

        <a href="/admin/posts/{{ $post->id }}">
            <h2 class="font-semibold text-lg truncate">
                {{ $post->title }}
            </h2>

            <p class="text-sm text-gray-500 mb-2">
                {{ $post->created_at->format('d M Y') }}
            </p>

            <p class="text-gray-700 text-sm line-clamp-2">
                {{ $post->excerpt }}
            </p>
        </a>

        {{-- Actions --}}
        <div class="flex gap-4 text-sm mt-auto pt-2">
            <a href="/admin/posts/{{ $post->id }}/edit"
               class="text-blue-600 hover:underline">
                Edit
            </a>

            <form method="POST" action="/admin/posts/{{ $post->id }}">
                @csrf
                @method('DELETE')
                <button
                    onclick="return confirm('Delete this post?')"
                    class="text-red-600 hover:underline">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@empty
<p class="text-gray-500">No posts yet.</p>
@endforelse

</div>
@endsection
