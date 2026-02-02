@php use Illuminate\Support\Str; @endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Home
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- contoh konten -->
            @foreach($posts as $post)
            <article class="mb-6">
                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-48 object-cover">

                <p class="text-sm text-gray-500">
                    {{ $post->created_at->format('d M Y') }}
                </p>

                <h2 class="text-xl font-bold">{{ $post->title }}</h2>

                <p>{{ $post->excerpt }}</p>

            </article>

            <!-- FITUR KHUSUS VISITOR -->
                @auth
                    <div class="mt-4 flex gap-4">
                        <button class="text-blue-600">👍 Like</button>
                        <button class="text-green-600">💬 Comment</button>
                    </div>
                @else
                    <p class="mt-4 text-sm text-gray-500">
                        Login untuk like dan komentar
                    </p>
                @endauth
            @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
