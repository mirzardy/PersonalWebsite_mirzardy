@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <a href="{{ route('admin.project-categories.index') }}"
           class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Categories
        </a>
    </div>

    <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Category</h1>

    <form action="{{ route('admin.project-categories.update', $projectCategory) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
            <input type="text" name="name" id="name"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                   value="{{ old('name', $projectCategory->name) }}" required>
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" rows="3"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">{{ old('description', $projectCategory->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="color" class="block text-sm font-medium text-gray-700 mb-2">Color</label>
            <div class="flex items-center gap-3">
                <input type="color" name="color" id="color"
                       class="w-12 h-12 p-1 border border-gray-300 rounded-lg cursor-pointer"
                       value="{{ old('color', $projectCategory->color) }}">
                <input type="text" name="color_text" id="color_text"
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                       value="{{ old('color', $projectCategory->color) }}"
                       placeholder="#6366f1">
            </div>
            <p class="mt-1 text-sm text-gray-500">Choose a color for this category</p>
            @error('color')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon (Optional)</label>
            <input type="text" name="icon" id="icon"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                   value="{{ old('icon', $projectCategory->icon) }}"
                   placeholder="e.g., code, globe, laptop">
            <p class="mt-1 text-sm text-gray-500">Enter a simple icon name (will be displayed as text)</p>
            @error('icon')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit"
                    class="flex-1 px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                Update Category
            </button>
            <a href="{{ route('admin.project-categories.index') }}"
               class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    const colorInput = document.getElementById('color');
    const colorText = document.getElementById('color_text');

    colorInput.addEventListener('input', function() {
        colorText.value = this.value;
    });

    colorText.addEventListener('input', function() {
        if (/^#[0-9A-Fa-f]{6}$/.test(this.value)) {
            colorInput.value = this.value;
        }
    });
</script>
@endpush
@endsection
