@extends('admin.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">

    <h1 class="text-xl font-bold mb-6">Edit Post</h1>

    {{-- Error --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', $post->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white p-6 rounded shadow space-y-4">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
            <label class="block font-medium">Title</label>
            <input type="text"
                   name="title"
                   class="w-full border rounded p-2"
                   value="{{ old('title', $post->title) }}">
            @error('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Excerpt -->
        <div>
            <label class="block font-medium">Excerpt (Deskripsi singkat)</label>
            <textarea name="excerpt"
                      rows="2"
                      class="w-full border rounded p-2">{{ old('excerpt', $post->excerpt) }}</textarea>
            @error('excerpt')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Content -->
        <div>
            <label class="block font-medium">Content</label>
            <textarea name="content"
                      rows="6"
                      class="w-full border rounded p-2">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image -->
        <div>
            <label class="block font-medium mb-1">Image (optional)</label>

            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}"
                     class="w-48 h-32 object-cover rounded mb-2"
                     alt="Current Image">
            @endif

            <input type="file" name="image" class="w-full">
            @error('image')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Actions -->
        <div class="flex gap-3">
            <button class="bg-black text-black px-4 py-2 rounded">
                Update
            </button>

            <a href="{{ route('admin.posts.index') }}"
               class="px-4 py-2 border rounded hover:bg-gray-100">
                Cancel
            </a>
        </div>

    </form>
</div>
@endsection
