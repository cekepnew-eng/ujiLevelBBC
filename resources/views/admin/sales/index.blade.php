@extends('admin.layouts.new')

@section('title', 'Laporan Penjualan')

@section('page-title', 'Laporan Penjualan')

@section('content')
<!-- Filter Section -->
<div class="bg-white rounded-xl shadow-lg p-6 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Dari Tanggal</label>
            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" value="2024-01-01">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Sampai Tanggal</label>
            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" value="2024-12-31">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Laporan</label>
            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                <option>Semua Pesanan</option>
                <option>Paket</option>
                <option>Menu A La Carte</option>
                <option>Minuman</option>
            </select>
        </div>
        <div class="flex items-end">
            <button class="w-full bg-primary text-white py-2 px-4 rounded-lg hover:bg-primary-dark transition">
                <i class="fas fa-filter mr-2"></i>
                Filter
            </button>
        </div>
    </div>
</div>

<!-- Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-2">
            <h4 class="text-sm font-medium text-gray-600">Total Penjualan</h4>
            <i class="fas fa-chart-line text-green-500"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">Rp 45.678.000</p>
        <p class="text-xs text-green-600 mt-1">+12.5% dari bulan lalu</p>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-2">
            <h4 class="text-sm font-medium text-gray-600">Total Pesanan</h4>
            <i class="fas fa-shopping-cart text-blue-500"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">1,234</p>
        <p class="text-xs text-blue-600 mt-1">+8.2% dari bulan lalu</p>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-2">
            <h4 class="text-sm font-medium text-gray-600">Rata-rata Pesanan</h4>
            <i class="fas fa-receipt text-purple-500"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">Rp 37.000</p>
        <p class="text-xs text-purple-600 mt-1">+3.8% dari bulan lalu</p>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-2">
            <h4 class="text-sm font-medium text-gray-600">Menu Terlaris</h4>
            <i class="fas fa-trophy text-yellow-500"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">Bakso Urat</p>
        <p class="text-xs text-yellow-600 mt-1">345 pesanan</p>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- Monthly Sales Chart -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Grafik Penjualan Bulanan</h3>
        <canvas id="monthlySalesChart" width="400" height="250"></canvas>
    </div>
    
    <!-- Category Sales Chart -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Penjualan per Kategori</h3>
        <canvas id="categorySalesChart" width="400" height="250"></canvas>
    </div>
</div>

<!-- Sales Table -->
<div class="bg-white rounded-xl shadow-lg p-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-semibold text-gray-800">Detail Penjualan</h3>
        <div class="flex gap-2">
            <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition text-sm">
                <i class="fas fa-excel mr-2"></i>
                Export Excel
            </button>
            <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition text-sm">
                <i class="fas fa-file-pdf mr-2"></i>
                Export PDF
            </button>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Tanggal</th>
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">ID Pesanan</th>
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Pelanggan</th>
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Menu</th>
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Jumlah</th>
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Total</th>
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Status</th>
                    <th class="text-left py-3 px-4 text-sm font-medium text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm">01/12/2024</td>
                    <td class="py-3 px-4 text-sm font-medium">#ORD-001</td>
                    <td class="py-3 px-4 text-sm">Ahmad Rizki</td>
                    <td class="py-3 px-4 text-sm">Paket A</td>
                    <td class="py-3 px-4 text-sm">1</td>
                    <td class="py-3 px-4 text-sm font-medium">Rp 1.000.000</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Selesai</span>
                    </td>
                    <td class="py-3 px-4">
                        <button class="text-primary hover:text-primary-dark text-sm">Detail</button>
                    </td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm">01/12/2024</td>
                    <td class="py-3 px-4 text-sm font-medium">#ORD-002</td>
                    <td class="py-3 px-4 text-sm">Siti Nurhaliza</td>
                    <td class="py-3 px-4 text-sm">Bakso Urat</td>
                    <td class="py-3 px-4 text-sm">2</td>
                    <td class="py-3 px-4 text-sm font-medium">Rp 60.000</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Proses</span>
                    </td>
                    <td class="py-3 px-4">
                        <button class="text-primary hover:text-primary-dark text-sm">Detail</button>
                    </td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm">02/12/2024</td>
                    <td class="py-3 px-4 text-sm font-medium">#ORD-003</td>
                    <td class="py-3 px-4 text-sm">Budi Santoso</td>
                    <td class="py-3 px-4 text-sm">Paket C</td>
                    <td class="py-3 px-4 text-sm">1</td>
                    <td class="py-3 px-4 text-sm font-medium">Rp 1.500.000</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Dikirim</span>
                    </td>
                    <td class="py-3 px-4">
                        <button class="text-primary hover:text-primary-dark text-sm">Detail</button>
                    </td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm">02/12/2024</td>
                    <td class="py-3 px-4 text-sm font-medium">#ORD-004</td>
                    <td class="py-3 px-4 text-sm">Dewi Lestari</td>
                    <td class="py-3 px-4 text-sm">Mie Ayam</td>
                    <td class="py-3 px-4 text-sm">3</td>
                    <td class="py-3 px-4 text-sm font-medium">Rp 45.000</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Selesai</span>
                    </td>
                    <td class="py-3 px-4">
                        <button class="text-primary hover:text-primary-dark text-sm">Detail</button>
                    </td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm">03/12/2024</td>
                    <td class="py-3 px-4 text-sm font-medium">#ORD-005</td>
                    <td class="py-3 px-4 text-sm">Rudi Hermawan</td>
                    <td class="py-3 px-4 text-sm">Paket B</td>
                    <td class="py-3 px-4 text-sm">2</td>
                    <td class="py-3 px-4 text-sm font-medium">Rp 2.400.000</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Selesai</span>
                    </td>
                    <td class="py-3 px-4">
                        <button class="text-primary hover:text-primary-dark text-sm">Detail</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="flex items-center justify-between mt-6">
        <p class="text-sm text-gray-600">Menampilkan 1-5 dari 1,234 data</p>
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

@section('scripts')
<script>
    // Monthly Sales Chart
    const monthlyCtx = document.getElementById('monthlySalesChart').getContext('2d');
    const monthlyChart = new Chart(monthlyCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Penjualan (Rp)',
                data: [3200000, 3800000, 4200000, 4100000, 4800000, 5200000, 5800000, 5500000, 6200000, 6800000, 7200000, 7800000],
                backgroundColor: '#8B0000',
                borderColor: '#8B0000',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + (value/1000000).toFixed(1) + 'jt';
                        }
                    }
                }
            }
        }
    });

    // Category Sales Chart
    const categoryCtx = document.getElementById('categorySalesChart').getContext('2d');
    const categoryChart = new Chart(categoryCtx, {
        type: 'pie',
        data: {
            labels: ['Paket', 'Bakso', 'Mie', 'Minuman', 'Lainnya'],
            datasets: [{
                data: [35, 25, 20, 15, 5],
                backgroundColor: [
                    '#8B0000',
                    '#DAA520',
                    '#FF6B6B',
                    '#4299E1',
                    '#48BB78'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });
</script>
@endsection
