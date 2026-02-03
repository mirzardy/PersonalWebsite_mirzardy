@extends('admin.layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-6">Posts</h1>

<a href="/admin/posts/create"
   class="inline-block mb-4 px-4 py-2 bg-black text-black rounded text-sm">
    + New Post
</a>

<div class="space-y-4">
@forelse($posts as $post)
<a href="/admin/posts/{{ $post->id }}" class="block">
    {{-- PERUBAHAN 1: Tambahkan 'h-40' (atau tinggi lain) di parent agar semua kartu tingginya sama --}}
    <div class="bg-white p-4 rounded shadow flex gap-4 items-start h-40 overflow-hidden hover:bg-gray-50 transition">

        {{-- Image --}}
        @if($post->image)
            {{-- PERUBAHAN 2: Wrapper gambar diberi lebar tetap (w-48) dan tinggi penuh (h-full) --}}
            <div class="w-48 h-full flex-shrink-0 overflow-hidden rounded">
                <img
                    src="{{ asset('storage/' . $post->image) }}"
                    {{-- PERUBAHAN 3: object-cover wajib ada --}}
                    class="w-full h-full object-cover"
                    alt="{{ $post->title }}">
            </div>
        @else
            {{-- Opsi tambahan: Placeholder jika tidak ada gambar agar layout tidak rusak --}}
            <div class="w-48 h-full flex-shrink-0 bg-gray-200 rounded flex items-center justify-center text-gray-400">
                No Image
            </div>
        @endif

        {{-- Content (clickable) --}}
        <div class="flex-1 flex flex-col justify-between h-full">
            <div>
                {{-- Gunakan 'truncate' untuk judul agar satu baris saja --}}
                <h2 class="font-semibold text-lg truncate" title="{{ $post->title }}">
                    {{ $post->title }}
                </h2>

                <p class="text-sm text-gray-500 mb-2">
                    {{ $post->created_at->format('d M Y') }}
                </p>

                {{-- PERUBAHAN 4: line-clamp untuk membatasi teks excerpt (misal maks 2 baris) --}}
                <p class="text-gray-700 text-sm line-clamp-2">
                    {{ $post->excerpt }}
                </p>
            </div>

            {{-- Actions --}}
            <div class="flex gap-4 text-sm mt-auto pt-2">
                <a href="{{ route('admin.posts.edit', $post->id) }}" method="post"
                   class="px-4 py-2 bg-gray-800 text-white rounded text-sm">
                    Edit
                </a>

                <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
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
</a>
@empty
    <p class="text-gray-500">No posts yet.</p>
@endforelse
</div>
@endsection
