@extends('admin.layout')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Add New Branch</h1>
        <a href="{{ route('admin.branches.index') }}" class="text-gray-600 hover:text-gray-900">← Back</a>
    </div>

    <form action="{{ route('admin.branches.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-semibold mb-2">Branch Name *</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-600" placeholder="e.g., BBC - Bunderan Ciomas">
            @error('name')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Address *</label>
            <textarea name="address" required rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-600" placeholder="Full address">{{ old('address') }}</textarea>
            @error('address')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold mb-2">Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-600" placeholder="(0251) 123-4567">
                @error('phone')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
            </div>

            <div>
                <label class="block text-sm font-semibold mb-2">Operational Hours</label>
                <input type="text" name="operational_hours" value="{{ old('operational_hours') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-600" placeholder="08:00 - 22:00 WIB">
                @error('operational_hours')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2">Google Maps URL</label>
            <input type="url" name="google_maps_url" value="{{ old('google_maps_url') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-600" placeholder="https://www.google.com/maps?q=...">
            @error('google_maps_url')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
        </div>

        <div class="flex items-center">
            <input type="checkbox" name="is_main" value="1" {{ old('is_main') ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded focus:ring-2 focus:ring-blue-500">
            <label class="ml-3 text-sm font-semibold">Main Branch</label>
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 font-semibold">Create Branch</button>
            <a href="{{ route('admin.branches.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 font-semibold">Cancel</a>
        </div>
    </form>
</div>
@endsection
