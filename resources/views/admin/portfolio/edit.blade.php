@extends('admin.layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Profile / About Me</h1>

@if (session('success'))
    <div class="mb-4 text-green-600">{{ session('success') }}</div>
@endif

<form action="{{ route('admin.portfolio.update') }}" method="POST" enctype="multipart/form-data"
      class="space-y-5 max-w-xl">
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1">Nama</label>
        <input type="text" name="name"
               value="{{ old('name', $profile->name) }}"
               class="w-full border rounded p-2">
    </div>

    <div>
        <label class="block mb-1">Headline</label>
        <input type="text" name="headline"
               value="{{ old('headline', $profile->headline) }}"
               class="w-full border rounded p-2">
    </div>

    <div>
        <label class="block mb-1">About Me</label>
        <textarea name="about" rows="6"
                  class="w-full border rounded p-2">{{ old('about', $profile->about) }}</textarea>
    </div>

    <div>
        <label class="block mb-1">Detail Alamat</label>
        <textarea name="detail_alamat" rows="3"
                  class="w-full border rounded p-2">{{ old('detail_alamat', optional($profile->address)->detail_alamat) }}</textarea>
    </div>

    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block mb-1">RT</label>
            <input type="text" name="rt"
                   value="{{ old('rt', optional($profile->address)->rt) }}"
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block mb-1">RW</label>
            <input type="text" name="rw"
                   value="{{ old('rw', optional($profile->address)->rw) }}"
                   class="w-full border rounded p-2">
        </div>
    </div>

    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block mb-1">Kelurahan</label>
            <input type="text" name="kelurahan"
                   value="{{ old('kelurahan', optional($profile->address)->kelurahan) }}"
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block mb-1">Kecamatan</label>
            <input type="text" name="kecamatan"
                   value="{{ old('kecamatan', optional($profile->address)->kecamatan) }}"
                   class="w-full border rounded p-2">
        </div>
    </div>

    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block mb-1">Kabupaten/Kota</label>
            <input type="text" name="kabupaten_kota"
                   value="{{ old('kabupaten_kota', optional($profile->address)->kabupaten_kota) }}"
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block mb-1">Provinsi</label>
            <input type="text" name="provinsi"
                   value="{{ old('provinsi', optional($profile->address)->provinsi) }}"
                   class="w-full border rounded p-2">
        </div>
    </div>

    <div>
        <label class="block mb-1">Kode Pos</label>
        <input type="text" name="kode_pos"
               value="{{ old('kode_pos', optional($profile->address)->kode_pos) }}"
               class="w-full border rounded p-2">
    </div>

    <div>
        <label class="block mb-1">Foto</label>
        <input type="file" name="photo">
    </div>

    <div>
        <label class="block mb-1">CV (PDF)</label>
        <input type="file" name="cv">
    </div>

    <button class="px-5 py-2 bg-blue-600 text-black rounded">
        Simpan
    </button>
</form>

{{-- SKILLS --}}
<hr class="my-10">
<h2 class="text-xl font-bold mb-4">Skills</h2>
@if (session('skill_success'))
    <div class="mb-4 text-green-600">{{ session('skill_success') }}</div>
@endif

{{-- FORM TAMBAH SKILL --}}
<form action="{{ route('admin.portfolio-skills.store') }}" method="POST"
      class="flex gap-3 mb-6 max-w-xl">
    @csrf
    <input type="text" name="name" placeholder="Nama skill"
           class="border rounded p-2 flex-1" required>

    <input type="number" name="level" placeholder="Level %"
           class="border rounded p-2 w-28">

    <button class="px-4 py-2 bg-green-600 text-black rounded">
        Tambah
    </button>
</form>

{{-- LIST SKILL --}}
<div class="space-y-3 max-w-xl">
@forelse ($skills as $skill)
    <div class="flex items-center gap-2">
        {{-- UPDATE --}}
        <form action="{{ route('admin.portfolio-skills.update', $skill) }}"
              method="POST" class="flex gap-2 flex-1">
            @csrf
            @method('PUT')

            <input type="text" name="name"
                   value="{{ $skill->name }}"
                   class="border rounded p-2 flex-1">

            <input type="number" name="level"
                   value="{{ $skill->level }}"
                   class="border rounded p-2 w-24">

            <button class="text-blue-600 text-sm">
                Update
            </button>
        </form>

        {{-- DELETE --}}
        <form action="{{ route('admin.portfolio-skills.destroy', $skill) }}"
              method="POST"
              onsubmit="return confirm('Hapus skill ini?')">
            @csrf
            @method('DELETE')
            <button class="text-red-600 text-sm">
                Hapus
            </button>
        </form>
    </div>
@empty
    <p class="text-gray-500">Belum ada skill.</p>
@endforelse
</div>

{{-- EDUCATION --}}
<hr class="my-12">
<h2 class="text-xl font-bold mb-4">Education</h2>
{{-- FORM --}}
<form id="educationForm"
      action="{{ route('admin.portfolio-educations.store') }}"
      method="POST"
      class="grid grid-cols-2 gap-3 max-w-2xl mb-6">
    @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="education_id" id="education_id">

    <input name="school" id="school" placeholder="Universitas / Sekolah"
           class="border rounded p-2 col-span-2" required>

    <input name="degree" id="degree" placeholder="Degree (S1, SMA)"
           class="border rounded p-2">

    <input name="field" id="field" placeholder="Jurusan"
           class="border rounded p-2">

    <input name="start_year" id="start_year" placeholder="Mulai"
           class="border rounded p-2">
    @error('start_year')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror

    <input name="end_year" id="end_year" placeholder="Selesai"
           class="border rounded p-2">
    @error('end_year')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror

    <input type="hidden" name="is_current" value="0">

    <label class="flex items-center gap-2">
        <input type="checkbox" name="is_current" id="is_current" value="1">
        Masih menempuh
    </label>

    <div class="col-span-2 flex gap-2">
        <button class="bg-blue-600 text-black py-2 rounded flex-1"
                id="submitBtn">
            Simpan
        </button>

        <button type="button"
                class="bg-gray-300 text-black py-2 rounded flex-1 hidden"
                id="cancelBtn"
                onclick="cancelEdit()">
            Batal
        </button>
    </div>

</form>


{{-- LIST --}}
<table class="w-full max-w-3xl border border-gray-200 text-sm">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-3 py-2">Sekolah</th>
            <th class="border px-3 py-2">Jurusan</th>
            <th class="border px-3 py-2">Tahun</th>
            <th class="border px-3 py-2 w-28">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($educations as $edu)
        <tr>
            <td class="border px-3 py-2">
                <div class="font-medium">{{ $edu->school }}</div>
                <div class="text-gray-500 text-xs">{{ $edu->degree }}</div>
            </td>
            <td class="border px-3 py-2">{{ $edu->field }}</td>
            <td class="border px-3 py-2">
                {{ $edu->start_year }} -
                {{ $edu->is_current ? 'Sekarang' : $edu->end_year }}
            </td>
            <td class="border px-3 py-2 text-center">
                <button type="button"
                        class="text-blue-600 text-sm"
                        onclick='editEducation(@json($edu))'>
                    Edit
                </button>

                <form action="{{ route('admin.portfolio-educations.destroy', $edu) }}"
                      method="POST"
                      class="inline"
                      onsubmit="return confirm("Hapus education?")">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 text-sm ml-2">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- EXPERIENCE --}}
<hr class="my-12">
<h2 class="text-xl font-bold mb-4">Experience</h2>

@if (session('experience_success'))
    <div class="mb-4 text-green-600">{{ session('experience_success') }}</div>
@endif

<form id="experienceForm"
      action="{{ route('admin.portfolio-experiences.store') }}"
      method="POST"
      class="grid grid-cols-2 gap-3 max-w-3xl mb-6">
    @csrf
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" id="experience_id">

    <input name="company" id="company"
           placeholder="Nama Perusahaan"
           class="border rounded p-2 col-span-2" required>

    <input name="position" id="position"
           placeholder="Posisi / Jabatan"
           class="border rounded p-2">

    <input name="type" id="type"
           placeholder="Tipe (Full-time, Internship)"
           class="border rounded p-2">

    <textarea name="description" id="description"
              placeholder="Deskripsi pekerjaan"
              class="border rounded p-2 col-span-2"
              rows="3"></textarea>

    <input name="start_year" id="exp_start_year"
           placeholder="Mulai"
           class="border rounded p-2">

    <input name="end_year" id="exp_end_year"
           placeholder="Selesai"
           class="border rounded p-2">

    <input type="hidden" name="is_current" value="0">

    <label class="flex items-center gap-2 col-span-2">
        <input type="checkbox" name="is_current" id="exp_is_current" value="1">
        Masih bekerja
    </label>

    <div class="col-span-2 flex gap-2">
        <button class="bg-blue-600 text-black py-2 rounded flex-1"
                id="expSubmitBtn">
            Simpan
        </button>

        <button type="button"
                class="bg-gray-300 text-black py-2 rounded flex-1 hidden"
                id="expCancelBtn"
                onclick="cancelExperienceEdit()">
            Batal
        </button>
    </div>
</form>

{{-- LIST EXPERIENCE --}}
<table class="w-full max-w-4xl border border-gray-200 text-sm">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-3 py-2">Perusahaan</th>
            <th class="border px-3 py-2">Posisi</th>
            <th class="border px-3 py-2">Tahun</th>
            <th class="border px-3 py-2 w-28">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($experiences as $exp)
        <tr>
            <td class="border px-3 py-2">
                <div class="font-medium">{{ $exp->company }}</div>
                <div class="text-xs text-gray-500">{{ $exp->type }}</div>
            </td>
            <td class="border px-3 py-2">
                {{ $exp->position }}
            </td>
            <td class="border px-3 py-2">
                {{ $exp->start_year }} -
                {{ $exp->is_current ? 'Sekarang' : $exp->end_year }}
            </td>
            <td class="border px-3 py-2 text-center">
                <button type="button"
                        class="text-blue-600 text-sm"
                        onclick='editExperience(@json($exp))'>
                    Edit
                </button>

                <form action="{{ route('admin.portfolio-experiences.destroy', $exp) }}"
                      method="POST"
                      class="inline"
                      onsubmit="return confirm('Hapus experience ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 text-sm ml-2">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- LANGUAGES --}}
<hr class="my-12">
<h2 class="text-xl font-bold mb-4">Languages</h2>

@if (session('language_success'))
    <div class="mb-4 text-green-600">
        {{ session('language_success') }}
    </div>
@endif

{{-- FORM TAMBAH --}}
<form action="{{ route('admin.portfolio-languages.store') }}"
      method="POST"
      class="flex gap-3 mb-6 max-w-xl">
    @csrf

    <input name="name"
           placeholder="Bahasa"
           class="border rounded p-2 flex-1"
           required>

    <input name="level"
           placeholder="Level (Fluent, Intermediate)"
           class="border rounded p-2 w-48">

    <button class="px-4 py-2 bg-green-600 text-black rounded">
        Tambah
    </button>
</form>

{{-- LIST --}}
<div class="space-y-3 max-w-xl">
@forelse ($languages as $lang)
    <div class="flex items-center gap-2">

        {{-- UPDATE --}}
        <form action="{{ route('admin.portfolio-languages.update', $lang) }}"
              method="POST"
              class="flex gap-2 flex-1">
            @csrf
            @method('PUT')

            <input name="name"
                   value="{{ $lang->name }}"
                   class="border rounded p-2 flex-1">

            <input name="level"
                   value="{{ $lang->level }}"
                   class="border rounded p-2 w-40">

            <button class="text-blue-600 text-sm">
                Update
            </button>
        </form>

        {{-- DELETE --}}
        <form action="{{ route('admin.portfolio-languages.destroy', $lang) }}"
              method="POST"
              onsubmit="return confirm('Hapus language ini?')">
            @csrf
            @method('DELETE')
            <button class="text-red-600 text-sm">
                Hapus
            </button>
        </form>

    </div>
@empty
    <p class="text-gray-500">Belum ada language.</p>
@endforelse
</div>

{{-- HOBBY --}}
<hr class="my-12">
<h2 class="text-xl font-bold mb-4">Hobbies</h2>

@if (session('hobby_success'))
    <div class="mb-4 text-green-600">
        {{ session('hobby_success') }}
    </div>
@endif

{{-- FORM TAMBAH --}}
<form action="{{ route('admin.portfolio-hobbies.store') }}"
      method="POST"
      class="flex gap-3 mb-6 max-w-xl">
    @csrf

    <input name="name"
           placeholder="Nama hobby"
           class="border rounded p-2 flex-1"
           required>

    <button class="px-4 py-2 bg-green-600 text-black rounded">
        Tambah
    </button>
</form>

{{-- LIST --}}
<div class="space-y-3 max-w-xl">
@forelse ($hobbies as $hobby)
    <div class="flex items-center gap-2">

        {{-- UPDATE --}}
        <form action="{{ route('admin.portfolio-hobbies.update', $hobby) }}"
              method="POST"
              class="flex gap-2 flex-1">
            @csrf
            @method('PUT')

            <input name="name"
                   value="{{ $hobby->name }}"
                   class="border rounded p-2 flex-1">

            <button class="text-blue-600 text-sm">
                Update
            </button>
        </form>

        {{-- DELETE --}}
        <form action="{{ route('admin.portfolio-hobbies.destroy', $hobby) }}"
              method="POST"
              onsubmit="return confirm('Hapus hobby ini?')">
            @csrf
            @method('DELETE')
            <button class="text-red-600 text-sm">
                Hapus
            </button>
        </form>

    </div>
@empty
    <p class="text-gray-500">Belum ada hobby.</p>
@endforelse
</div>

@endsection

{{-- JS for Education --}}
<script>
function editEducation(data) {
    document.getElementById('education_id').value = data.id;
    document.getElementById('school').value = data.school;
    document.getElementById('degree').value = data.degree ?? '';
    document.getElementById('field').value = data.field ?? '';
    document.getElementById('start_year').value = data.start_year ?? '';
    document.getElementById('end_year').value = data.end_year ?? '';
    document.getElementById('is_current').checked = data.is_current;

    const form = document.getElementById('educationForm');
    form.action = `/admin/portfolio-educations/${data.id}`;
    form.querySelector('input[name="_method"]').value = 'PUT';

    document.getElementById('submitBtn').innerText = 'Update';
    document.getElementById('cancelBtn').classList.remove('hidden');

    window.scrollTo({ top: form.offsetTop - 100, behavior: 'smooth' });
}

function cancelEdit() {
    const form = document.getElementById('educationForm');

    form.reset();

    document.getElementById('education_id').value = '';
    form.action = "{{ route('admin.portfolio-educations.store') }}";
    form.querySelector('input[name="_method"]').value = 'POST';

    document.getElementById('submitBtn').innerText = 'Simpan';
    document.getElementById('cancelBtn').classList.add('hidden');
}

</script>

{{-- JS for Experience --}}
<script>
function editExperience(data) {
    document.getElementById('experience_id').value = data.id;
    document.getElementById('company').value = data.company;
    document.getElementById('position').value = data.position ?? '';
    document.getElementById('type').value = data.type ?? '';
    document.getElementById('description').value = data.description ?? '';
    document.getElementById('exp_start_year').value = data.start_year ?? '';
    document.getElementById('exp_end_year').value = data.end_year ?? '';
    document.getElementById('exp_is_current').checked = data.is_current;

    const form = document.getElementById('experienceForm');
    form.action = `/admin/portfolio-experiences/${data.id}`;
    form.querySelector('input[name="_method"]').value = 'PUT';

    document.getElementById('expSubmitBtn').innerText = 'Update';
    document.getElementById('expCancelBtn').classList.remove('hidden');

    window.scrollTo({ top: form.offsetTop - 100, behavior: 'smooth' });
}

function cancelExperienceEdit() {
    const form = document.getElementById('experienceForm');

    form.reset();
    form.action = "{{ route('admin.portfolio-experiences.store') }}";
    form.querySelector('input[name="_method"]').value = 'POST';

    document.getElementById('expSubmitBtn').innerText = 'Simpan';
    document.getElementById('expCancelBtn').classList.add('hidden');
}
</script>
