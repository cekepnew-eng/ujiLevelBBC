@extends('admin.layout')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">Admin Dashboard</h1>
        <a href="{{ route('home') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">← Back to Site</a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-gray-600 text-sm font-semibold mb-2">Total Menu Items</h3>
            <p class="text-4xl font-bold text-blue-600">{{ $stats['total_menu'] ?? 0 }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-gray-600 text-sm font-semibold mb-2">Branches</h3>
            <p class="text-4xl font-bold text-green-600">{{ $stats['branches'] ?? 0 }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-gray-600 text-sm font-semibold mb-2">Pending Testimonials</h3>
            <p class="text-4xl font-bold text-yellow-600">0</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-gray-600 text-sm font-semibold mb-2">Total Orders</h3>
            <p class="text-4xl font-bold text-red-600">0</p>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('admin.menu.index') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <div class="text-4xl mb-3">🍔</div>
            <h3 class="text-xl font-bold mb-2">Menu Management</h3>
            <p class="text-gray-600">Manage bakso menu items, prices, and descriptions</p>
        </a>
        <a href="{{ route('admin.testimonials.index') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <div class="text-4xl mb-3">⭐</div>
            <h3 class="text-xl font-bold mb-2">Testimonials</h3>
            <p class="text-gray-600">Approve and manage customer testimonials</p>
        </a>
        <a href="{{ route('admin.branches.index') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <div class="text-4xl mb-3">📍</div>
            <h3 class="text-xl font-bold mb-2">Branches</h3>
            <p class="text-gray-600">Manage restaurant locations and information</p>
        </a>
    </div>
</div>
@endsection
