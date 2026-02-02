<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
        <div class="p-6 font-bold text-xl border-b">
            Admin Panel
        </div>

        <nav class="p-4 space-y-2">
            <a href="/admin" class="block px-4 py-2 rounded hover:bg-gray-100">
                Dashboard
            </a>
            <a href="/" class="block px-4 py-2 rounded hover:bg-gray-100">
                Home
            </a>
        </nav>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>

</body>
</html>
