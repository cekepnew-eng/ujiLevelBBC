@extends('admin.layout')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Edit Menu Item</h1>
        <a href="{{ route('admin.menu.index') }}" class="text-gray-600 hover:text-gray-900">← Back</a>
    </div>

    <form action="{{ route('admin.menu.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow space-y-6">
        @csrf @method('PUT')

        <div>
            <label class="block text-sm font-semibold mb-2">Item Name *</label>
            <input type="text" name="name" value="{{ old('name', $item->name) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-600">
            @error('name')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Category *</label>
            <select name="category" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-600">
                <option value="bakso" {{ old('category', $item->category) == 'bakso' ? 'selected' : '' }}>Bakso</option>
                <option value="mie" {{ old('category', $item->category) == 'mie' ? 'selected' : '' }}>Mie Ayam</option>
                <option value="paket" {{ old('category', $item->category) == 'paket' ? 'selected' : '' }}>Paket</option>
                <option value="minuman" {{ old('category', $item->category) == 'minuman' ? 'selected' : '' }}>Minuman</option>
            </select>
            @error('category')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Description *</label>
            <textarea name="description" required rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-600">{{ old('description', $item->description) }}</textarea>
            @error('description')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold mb-2">Price (Rp) *</label>
                <input type="number" name="price" value="{{ old('price', $item->price) }}" required step="1000" min="0" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-600">
                @error('price')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Image (Upload)</label>
                @if($item->image_path)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}" class="w-32 h-32 object-cover rounded-lg border">
                    <p class="text-xs text-gray-500 mt-1">Current image</p>
                </div>
                @endif
                <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-600">
                <p class="text-xs text-gray-500 mt-1">Leave empty to keep current image. Max 2MB.</p>
                @error('image')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="flex items-center">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded focus:ring-2 focus:ring-blue-500">
            <label class="ml-3 text-sm font-semibold">Active (Show in menu)</label>
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 font-semibold">Update Item</button>
            <a href="{{ route('admin.menu.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 font-semibold">Cancel</a>
        </div>
    </form>
</div>
@endsection
