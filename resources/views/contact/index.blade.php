@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-8">
    <div class="text-center">
        <h2 class="text-3xl font-semibold tracking-tight">Contact Me</h2>
        <p class="text-sm text-gray-500 mt-2">Silakan hubungi saya melalui detail di bawah ini.</p>
    </div>

    @php
        $address = $profile?->address;
    @endphp

    <div class="grid lg:grid-cols-2 gap-6">
        {{-- Contact Info --}}
        <section class="bg-white border border-gray-200 rounded-2xl p-6">
            <h3 class="text-lg font-semibold">Contact Info</h3>
            <div class="mt-4 grid sm:grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-gray-500">Email</p>
                    <p class="font-medium text-gray-800">{{ $contact->email ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Phone</p>
                    <p class="font-medium text-gray-800">{{ $contact->phone ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Detail</p>
                    <p class="font-medium text-gray-800">{{ $address->detail_alamat ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">RT/RW</p>
                    <p class="font-medium text-gray-800">{{ $address->rt ?? '-' }}/{{ $address->rw ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Kelurahan</p>
                    <p class="font-medium text-gray-800">{{ $address->kelurahan ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Kecamatan</p>
                    <p class="font-medium text-gray-800">{{ $address->kecamatan ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Kabupaten/Kota</p>
                    <p class="font-medium text-gray-800">{{ $address->kabupaten_kota ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Provinsi</p>
                    <p class="font-medium text-gray-800">{{ $address->provinsi ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Kode Pos</p>
                    <p class="font-medium text-gray-800">{{ $address->kode_pos ?? '-' }}</p>
                </div>
            </div>
        </section>

        {{-- Social Links --}}
        <section class="bg-white border border-gray-200 rounded-2xl p-6">
            <h3 class="text-lg font-semibold">Social Links</h3>
            <div class="mt-4 flex flex-wrap gap-2">
                @forelse($links as $link)
                    <a href="{{ $link->url }}" target="_blank"
                       class="px-4 py-2 text-sm border border-gray-300 rounded-full hover:bg-gray-50">
                        {{ $link->name }}
                    </a>
                @empty
                    <p class="text-gray-500 text-sm">Belum ada link sosial.</p>
                @endforelse
            </div>
        </section>
    </div>
</div>
@endsection
