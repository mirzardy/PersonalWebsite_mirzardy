@extends('admin.layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>

    <div class="grid grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded shadow">
            <p class="text-gray-500">Users</p>
            <p class="text-2xl font-bold">—</p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <p class="text-gray-500">Posts</p>
            <p class="text-2xl font-bold">—</p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <p class="text-gray-500">Comments</p>
            <p class="text-2xl font-bold">—</p>
        </div>
    </div>
@endsection
