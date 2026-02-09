<footer class="bg-white border-t border-gray-200 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">

            {{-- Kolom 1: Identitas --}}
            <div class="col-span-1 md:col-span-2">
                <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                    {{-- Ikon Opsional --}}
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    {{ config('app.name', 'Mirzardy') }}
                </h2>
                <p class="text-gray-500 mt-4 text-sm leading-relaxed max-w-xs">
                    Membangun solusi digital dengan teknologi modern. Fokus pada pengembangan web yang bersih, cepat, dan user-friendly.
                </p>
            </div>

            {{-- Kolom 2: Navigasi Cepat --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">Menu</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="/" class="text-gray-500 hover:text-blue-600 transition text-sm">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('posts.index') }}" class="text-gray-500 hover:text-blue-600 transition text-sm">Blog & Artikel</a>
                    </li>
                    <li>
                        <a href="{{ route('contact.index') }}" class="text-gray-500 hover:text-blue-600 transition text-sm">Contact Me</a>
                    </li>
                </ul>
            </div>

            {{-- Kolom 3: Social Media --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">Connect</h3>
                <div class="flex space-x-4">
                    {{-- GitHub --}}
                    <a href="https://github.com/mirzardy" target="_blank" class="text-gray-400 hover:text-gray-900 transition">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path></svg>
                    </a>

                    {{-- LinkedIn (Ganti href dengan link LinkedIn kamu nanti) --}}
                    <a href="#" target="_blank" class="text-gray-400 hover:text-blue-700 transition">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>

                    {{-- Instagram --}}
                    <a href="https://instagram.com/mirzlazuardy" target="_blank" class="text-gray-400 hover:text-pink-600 transition">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772 4.902 4.902 0 011.772-1.153c.636-.247 1.363-.416 2.427-.465C9.673 2.013 10.03 2 12.484 2h.166zM12 7a5 5 0 100 10 5 5 0 000-10zm0 8a3 3 0 110-6 3 3 0 010 6zm5.338-3.205a1.2 1.2 0 110-2.4 1.2 1.2 0 010 2.4z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="border-t border-gray-100 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm text-gray-500">
                &copy; {{ date('Y') }} {{ config('app.name', 'Mirzardy') }}. All rights reserved.
            </p>
            <p class="text-sm text-gray-400 mt-2 md:mt-0 flex items-center gap-1">
                Made with
                <svg class="w-4 h-4 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                using Laravel & Tailwind
            </p>
        </div>
    </div>
</footer>
