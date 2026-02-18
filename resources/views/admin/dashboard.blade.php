@extends('admin.layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-6">Admin Dashboard</h1>

{{-- STATS --}}
<div class="grid md:grid-cols-3 gap-4 mb-8">
    <div class="bg-white p-4 rounded shadow">
        <p class="text-gray-500 text-sm">Users</p>
        <p class="text-2xl font-bold">{{ $userCount }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <p class="text-gray-500 text-sm">Posts</p>
        <p class="text-2xl font-bold">{{ $postCount }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow opacity-60">
        <p class="text-gray-500 text-sm">Comments</p>
        <p class="text-2xl font-bold">—</p>
        <p class="text-xs text-gray-400">Coming soon</p>
    </div>
</div>

{{-- USER LIST --}}
<h2 class="text-lg font-semibold mb-4">Users</h2>

<div class="space-y-4">
@forelse ($users as $user)
    <div class="bg-white p-4 rounded shadow flex items-center justify-between hover:bg-gray-50 transition">

        {{-- USER INFO --}}
        <div>
            <p class="font-medium">
                {{ $user->name }}
            </p>
            <p class="text-sm text-gray-500">
                {{ $user->email }}
            </p>
            <p class="text-xs text-gray-400 mt-1">
                Joined {{ $user->created_at->format('d M Y') }}
            </p>
        </div>

        {{-- ROLE --}}
        <div>
            @if ($user->isAdmin())
                <span class="px-3 py-1 text-xs rounded bg-grey-200 text-grey-700">
                    Admin
                </span>
            @else
                <span class="px-3 py-1 text-xs rounded bg-black text-black">
                    Visitor
                </span>
            @endif
        </div>

    </div>
@empty
    <p class="text-gray-500">No users found.</p>
@endforelse
</div>
@endsection
