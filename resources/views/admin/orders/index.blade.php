@extends('admin.layouts.new')

@section('title', 'Pesanan')

@section('page-title', 'Manajemen Pesanan')

@section('content')
<!-- Filter Section -->
<div class="bg-white rounded-xl shadow-lg p-6 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Status Pesanan</label>
            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                <option>Semua Status</option>
                <option>Menunggu Pembayaran</option>
                <option>Diproses</option>
                <option>Dikirim</option>
                <option>Selesai</option>
                <option>Dibatalkan</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Dari Tanggal</label>
            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Sampai Tanggal</label>
            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
        </div>
        <div class="flex items-end">
            <button class="w-full bg-primary text-white py-2 px-4 rounded-lg hover:bg-primary-dark transition">
                <i class="fas fa-search mr-2"></i>
                Cari
            </button>
        </div>
    </div>
</div>

<!-- Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-2">
            <h4 class="text-sm font-medium text-gray-600">Menunggu Pembayaran</h4>
            <i class="fas fa-clock text-yellow-500"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">12</p>
        <p class="text-xs text-gray-500 mt-1">Rp 2.400.000</p>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-2">
            <h4 class="text-sm font-medium text-gray-600">Diproses</h4>
            <i class="fas fa-cog text-blue-500"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">8</p>
        <p class="text-xs text-gray-500 mt-1">Rp 1.800.000</p>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-2">
            <h4 class="text-sm font-medium text-gray-600">Dikirim</h4>
            <i class="fas fa-truck text-purple-500"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">15</p>
        <p class="text-xs text-gray-500 mt-1">Rp 3.600.000</p>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-2">
            <h4 class="text-sm font-medium text-gray-600">Selesai</h4>
            <i class="fas fa-check-circle text-green-500"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">156</p>
        <p class="text-xs text-gray-500 mt-1">Rp 45.678.000</p>
    </div>
</div>

<!-- Orders Table -->
<div class="bg-white rounded-xl shadow-lg p-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-semibold text-gray-800">Daftar Pesanan</h3>
        <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition text-sm">
            <i class="fas fa-download mr-2"></i>
            Export Data
        </button>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">ID Pesanan</th>
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Tanggal</th>
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Pelanggan</th>
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Menu</th>
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Total</th>
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Status</th>
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm font-medium">#ORD-001</td>
                    <td class="py-3 px-4 text-sm">01/12/2024 10:30</td>
                    <td class="py-3 px-4 text-sm">
                        <div class="flex items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Ahmad+Rizki&background=8B0000&color=fff" 
                                 alt="Customer" 
                                 class="w-8 h-8 rounded-full">
                            <div>
                                <p class="font-medium">Ahmad Rizki</p>
                                <p class="text-xs text-gray-500">08123456789</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-sm">
                        <div class="space-y-1">
                            <p class="text-xs bg-gray-100 px-2 py-1 rounded">Paket A x1</p>
                            <p class="text-xs bg-gray-100 px-2 py-1 rounded">Es Teh x2</p>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-sm font-medium">Rp 1.020.000</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Menunggu Pembayaran</span>
                    </td>
                    <td class="py-3 px-4">
                        <div class="flex gap-2">
                            <button class="text-blue-600 hover:text-blue-800 text-sm">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-800 text-sm">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-800 text-sm">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm font-medium">#ORD-002</td>
                    <td class="py-3 px-4 text-sm">01/12/2024 11:15</td>
                    <td class="py-3 px-4 text-sm">
                        <div class="flex items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Siti+Nurhaliza&background=8B0000&color=fff" 
                                 alt="Customer" 
                                 class="w-8 h-8 rounded-full">
                            <div>
                                <p class="font-medium">Siti Nurhaliza</p>
                                <p class="text-xs text-gray-500">08123456790</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-sm">
                        <div class="space-y-1">
                            <p class="text-xs bg-gray-100 px-2 py-1 rounded">Bakso Urat x2</p>
                            <p class="text-xs bg-gray-100 px-2 py-1 rounded">Mie Ayam x1</p>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-sm font-medium">Rp 60.000</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Diproses</span>
                    </td>
                    <td class="py-3 px-4">
                        <div class="flex gap-2">
                            <button class="text-blue-600 hover:text-blue-800 text-sm">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-800 text-sm">
                                <i class="fas fa-truck"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-800 text-sm">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm font-medium">#ORD-003</td>
                    <td class="py-3 px-4 text-sm">01/12/2024 12:45</td>
                    <td class="py-3 px-4 text-sm">
                        <div class="flex items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=8B0000&color=fff" 
                                 alt="Customer" 
                                 class="w-8 h-8 rounded-full">
                            <div>
                                <p class="font-medium">Budi Santoso</p>
                                <p class="text-xs text-gray-500">08123456791</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-sm">
                        <div class="space-y-1">
                            <p class="text-xs bg-gray-100 px-2 py-1 rounded">Paket C x1</p>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-sm font-medium">Rp 1.500.000</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs rounded-full">Dikirim</span>
                    </td>
                    <td class="py-3 px-4">
                        <div class="flex gap-2">
                            <button class="text-blue-600 hover:text-blue-800 text-sm">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-800 text-sm">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-800 text-sm">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm font-medium">#ORD-004</td>
                    <td class="py-3 px-4 text-sm">02/12/2024 09:20</td>
                    <td class="py-3 px-4 text-sm">
                        <div class="flex items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Dewi+Lestari&background=8B0000&color=fff" 
                                 alt="Customer" 
                                 class="w-8 h-8 rounded-full">
                            <div>
                                <p class="font-medium">Dewi Lestari</p>
                                <p class="text-xs text-gray-500">08123456792</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-sm">
                        <div class="space-y-1">
                            <p class="text-xs bg-gray-100 px-2 py-1 rounded">Paket B x2</p>
                            <p class="text-xs bg-gray-100 px-2 py-1 rounded">Es Campur x4</p>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-sm font-medium">Rp 2.480.000</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Selesai</span>
                    </td>
                    <td class="py-3 px-4">
                        <div class="flex gap-2">
                            <button class="text-blue-600 hover:text-blue-800 text-sm">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-gray-600 hover:text-gray-800 text-sm">
                                <i class="fas fa-print"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="flex items-center justify-between mt-6">
        <p class="text-sm text-gray-600">Menampilkan 1-4 dari 191 pesanan</p>
        <div class="flex gap-2">
            <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-50 text-sm">Previous</button>
            <button class="px-3 py-1 bg-primary text-white rounded-lg text-sm">1</button>
            <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-50 text-sm">2</button>
            <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-50 text-sm">3</button>
            <button class="px-3 py-1 border border-gray-300 rounded-lg hover:bg-gray-50 text-sm">Next</button>
        </div>
    </div>
</div>
@endsection
