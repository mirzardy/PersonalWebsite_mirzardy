@extends('layouts.app')

@section('content')
<section id="contact" class="py-16">
    <div class="container mx-auto max-w-3xl">

        <h2 class="text-3xl font-bold mb-6 text-center">
            Contact Me
        </h2>

        {{-- Contact Info --}}
        @php
            $address = $profile?->address;
        @endphp
        <div class="mb-8 text-center">
            <p>Email: {{ $contact->email ?? '-' }}</p>
            <p>Phone: {{ $contact->phone ?? '-' }}</p>
            <p>Detail: {{ $address->detail_alamat ?? '-' }}</p>
            <p>RT/RW: {{ $address->rt ?? '-' }}/{{ $address->rw ?? '-' }}</p>
            <p>Kelurahan: {{ $address->kelurahan ?? '-' }}</p>
            <p>Kecamatan: {{ $address->kecamatan ?? '-' }}</p>
            <p>Kabupaten/Kota: {{ $address->kabupaten_kota ?? '-' }}</p>
            <p>Provinsi: {{ $address->provinsi ?? '-' }}</p>
            <p>Kode Pos: {{ $address->kode_pos ?? '-' }}</p>
        </div>

        {{-- Social Links --}}
        <div class="flex justify-center gap-4 mb-10">
            @foreach($links as $link)
                <a href="{{ $link->url }}" target="_blank"
                   class="px-4 py-2 bg-gray-200 rounded">
                    {{ $link->name }}
                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
