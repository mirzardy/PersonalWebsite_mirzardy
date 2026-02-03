@extends('admin.layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8">
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/admin/posts') }}" method="POST" enctype="multipart/form-data"
              class="bg-white p-6 rounded shadow space-y-4">
            @csrf

            <!-- Title -->
            <div>
                <label class="block font-medium">Title</label>
                <input type="text" name="title" class="w-full border rounded p-2"
                       value="{{ old('title') }}">
                @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Excerpt -->
            <div>
                <label class="block font-medium">Excerpt (Deskripsi singkat)</label>
                <textarea name="excerpt" rows="2" required
                          class="w-full border rounded p-2">{{ old('excerpt') }}</textarea>
            </div>

            <!-- Content -->
            <div>
                <label class="block font-medium">Content</label>
                <textarea name="content" rows="6"
                          class="w-full border rounded p-2">{{ old('content') }}</textarea>
            </div>

            <!-- Image -->
            <div>
                <label class="block font-medium">Image (optional)</label>
                <input type="file" name="image" class="w-full">
            </div>

            <button class="bg-black text-black px-4 py-2 rounded">
                Publish
            </button>
        </form>
    </div>
@endsection
