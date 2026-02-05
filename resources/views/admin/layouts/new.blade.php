<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Bakso Bunderan Ciomas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'primary': '#8B0000',
                        'secondary': '#DAA520',
                        'accent': '#FF6B6B',
                        'neutral': '#2D3748',
                        'cream': '#F5E9D8',
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar-item {
            transition: all 0.3s ease;
        }
        .sidebar-item:hover {
            transform: translateX(5px);
        }
        .sidebar-item.active {
            background: linear-gradient(90deg, #8B0000 0%, #8B0000 100%);
            color: white;
        }
        .stat-card {
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-gray-50 font-poppins">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg">
            <div class="p-6 border-b">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                        <i class="fas fa-utensils text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">BBC Admin</h1>
                        <p class="text-xs text-gray-500">Bakso Bunderan Ciomas</p>
                    </div>
                </div>
            </div>
            
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-red-50 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt w-5"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.menu.index') }}" 
                           class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-red-50 {{ request()->routeIs('admin.menu.*') ? 'active' : '' }}">
                            <i class="fas fa-utensils w-5"></i>
                            <span>Menu Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.branches.index') }}" 
                           class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-red-50 {{ request()->routeIs('admin.branches.*') ? 'active' : '' }}">
                            <i class="fas fa-map-marker-alt w-5"></i>
                            <span>Lokasi Cabang</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.sales.index') }}" 
                           class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-red-50 {{ request()->routeIs('admin.sales.*') ? 'active' : '' }}">
                            <i class="fas fa-chart-line w-5"></i>
                            <span>Laporan Penjualan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.testimonials.index') }}" 
                           class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-red-50 {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                            <i class="fas fa-star w-5"></i>
                            <span>Testimoni</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders.index') }}" 
                           class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-red-50 {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                            <i class="fas fa-shopping-cart w-5"></i>
                            <span>Pesanan</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t">
                <div class="flex items-center gap-3 px-4 py-3">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=8B0000&color=fff" 
                         alt="Admin" 
                         class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">Admin User</p>
                        <p class="text-xs text-gray-500">admin@bbc.com</p>
                    </div>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm border-b">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <button class="lg:hidden text-gray-600 hover:text-gray-900">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h2 class="text-2xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="relative text-gray-600 hover:text-gray-900">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
                        </button>
                        <button class="text-gray-600 hover:text-gray-900">
                            <i class="fas fa-cog text-xl"></i>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
                <div class="container-fluid px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    @yield('scripts')
</body>
</html>
