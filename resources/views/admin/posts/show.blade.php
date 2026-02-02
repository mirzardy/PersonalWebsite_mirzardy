@extends('admin.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    {{-- Title --}}
    <h1 class="text-2xl font-bold">{{ $post->title }}</h1>

    {{-- Meta --}}
    <p class="text-sm text-gray-500">
        {{ $post->created_at->format('d M Y') }}
    </p>

    {{-- Image --}}
    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}"
             class="w-full h-72 object-cover rounded">
    @endif

    {{-- Content --}}
    <div class="prose max-w-none">
        {{ $post->content }}
    </div>

    {{-- Actions --}}
    <div class="flex gap-4 pt-6 border-t">
        <a href="/admin/posts/{{ $post->id }}/edit"
           class="px-4 py-2 bg-gray-800 text-white rounded">
            Edit
        </a>

        <form method="POST" action="/admin/posts/{{ $post->id }}">
            @csrf
            @method('DELETE')
            <button
                onclick="return confirm('Delete this post?')"
                class="px-4 py-2 bg-red-600 text-white rounded">
                Delete
            </button>
        </form>
    </div>

</div>
@endsection
