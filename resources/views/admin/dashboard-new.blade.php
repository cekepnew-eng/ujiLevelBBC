@extends('admin.layouts.new')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Revenue Card -->
    <div class="stat-card bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-dollar-sign text-green-600 text-xl"></i>
            </div>
            <span class="text-sm text-green-600 font-medium">+12.5%</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-1">Rp 45.678.000</h3>
        <p class="text-sm text-gray-500">Total Pendapatan</p>
    </div>

    <!-- Total Orders Card -->
    <div class="stat-card bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-shopping-cart text-blue-600 text-xl"></i>
            </div>
            <span class="text-sm text-blue-600 font-medium">+8.2%</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-1">1,234</h3>
        <p class="text-sm text-gray-500">Total Pesanan</p>
    </div>

    <!-- Total Customers Card -->
    <div class="stat-card bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-users text-purple-600 text-xl"></i>
            </div>
            <span class="text-sm text-purple-600 font-medium">+15.3%</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-1">5,678</h3>
        <p class="text-sm text-gray-500">Total Pelanggan</p>
    </div>

    <!-- Total Menu Items Card -->
    <div class="stat-card bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-utensils text-orange-600 text-xl"></i>
            </div>
            <span class="text-sm text-orange-600 font-medium">+2 items</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ \App\Models\MenuItem::count() }}</h3>
        <p class="text-sm text-gray-500">Total Menu</p>
    </div>
</div>

<!-- Quick Actions Section -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Recent Orders -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Pesanan Terbaru</h3>
            <a href="#" class="text-primary text-sm hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3 px-2 text-sm font-medium text-gray-600">ID Pesanan</th>
                        <th class="text-left py-3 px-2 text-sm font-medium text-gray-600">Pelanggan</th>
                        <th class="text-left py-3 px-2 text-sm font-medium text-gray-600">Total</th>
                        <th class="text-left py-3 px-2 text-sm font-medium text-gray-600">Status</th>
                        <th class="text-left py-3 px-2 text-sm font-medium text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-2 text-sm">#ORD-001</td>
                        <td class="py-3 px-2 text-sm">Ahmad Rizki</td>
                        <td class="py-3 px-2 text-sm font-medium">Rp 150.000</td>
                        <td class="py-3 px-2">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Selesai</span>
                        </td>
                        <td class="py-3 px-2">
                            <button class="text-primary hover:text-primary-dark text-sm">Detail</button>
                        </td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-2 text-sm">#ORD-002</td>
                        <td class="py-3 px-2 text-sm">Siti Nurhaliza</td>
                        <td class="py-3 px-2 text-sm font-medium">Rp 200.000</td>
                        <td class="py-3 px-2">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Proses</span>
                        </td>
                        <td class="py-3 px-2">
                            <button class="text-primary hover:text-primary-dark text-sm">Detail</button>
                        </td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-2 text-sm">#ORD-003</td>
                        <td class="py-3 px-2 text-sm">Budi Santoso</td>
                        <td class="py-3 px-2 text-sm font-medium">Rp 1.200.000</td>
                        <td class="py-3 px-2">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Dikirim</span>
                        </td>
                        <td class="py-3 px-2">
                            <button class="text-primary hover:text-primary-dark text-sm">Detail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-6">Aksi Cepat</h3>
        <div class="space-y-3">
            <a href="{{ route('admin.menu.create') }}" 
               class="block w-full bg-primary text-white py-3 px-4 rounded-lg hover:bg-primary-dark transition text-center">
                <i class="fas fa-plus mr-2"></i>
                Tambah Menu Baru
            </a>
            <a href="{{ route('admin.branches.create') }}" 
               class="block w-full bg-secondary text-white py-3 px-4 rounded-lg hover:bg-secondary-dark transition text-center">
                <i class="fas fa-plus mr-2"></i>
                Tambah Lokasi Baru
            </a>
            <a href="#" 
               class="block w-full bg-green-500 text-white py-3 px-4 rounded-lg hover:bg-green-600 transition text-center">
                <i class="fas fa-download mr-2"></i>
                Export Laporan
            </a>
            <a href="#" 
               class="block w-full border border-gray-300 text-gray-700 py-3 px-4 rounded-lg hover:bg-gray-50 transition text-center">
                <i class="fas fa-cog mr-2"></i>
                Pengaturan
            </a>
        </div>
    </div>
</div>

@endsection
