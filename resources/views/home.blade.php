<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Home
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- contoh konten -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold">Judul Post</h3>
                <p class="mt-2 text-gray-600">
                    Ini konten bisa dilihat semua orang.
                </p>

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
            </div>

        </div>
    </div>
</x-app-layout>
