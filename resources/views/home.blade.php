  <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakso Bunderan Ciomas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        html { scroll-behavior: smooth; }
        .menu-item { animation: fadeIn 0.3s ease-in; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        
        .cart-btn {
            transition: all 0.3s ease;
        }

        .cart-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .cart-btn:active {
            transform: translateY(0);
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        .animate-slide-in {
            animation: slideIn 0.3s ease-out;
        }

        .animate-slide-out {
            animation: slideOut 0.3s ease-out;
        }

        .modal-backdrop {
            backdrop-filter: blur(4px);
        }

        .notification-enter {
            animation: slideIn 0.3s ease-out;
        }

        .notification-exit {
            animation: slideOut 0.3s ease-out;
        }
        .carousel-track { display: flex; gap: 2rem; transition: transform 0.5s ease-in-out; }
        .carousel-item { min-width: 320px; flex-shrink: 0; }
        .carousel-btn {
            position: absolute; top: 50%; transform: translateY(-50%);
            background-color: rgba(139, 0, 0, 0.8); color: white; border: none;
            width: 50px; height: 50px; border-radius: 50%; cursor: pointer;
            font-size: 24px; display: flex; align-items: center; justify-content: center;
            z-index: 10; transition: all 0.3s ease;
        }
        .carousel-btn:hover { background-color: rgba(139, 0, 0, 1); transform: translateY(-50%) scale(1.1); }
        .carousel-btn.prev { left: 10px; }
        .carousel-btn.next { right: 10px; }
        .contact-icon { transition: transform 0.3s ease; }
        .contact-icon:hover { transform: scale(1.1) rotate(5deg); }
        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .rekomendasi-slider { overflow: hidden; position: relative; }
        .rekomendasi-track { display: flex; gap: 2rem; transition: transform 1s ease-in-out; }
        .rekomendasi-item { min-width: calc(33.333% - 1.333rem); flex-shrink: 0; }
        
        /* Filter Button Styles */
        .filter-btn {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .filter-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .filter-btn:hover::before {
            left: 100%;
        }
        
        .filter-btn.active {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(139, 0, 0, 0.3);
        }
        
        /* Loading Spinner */
        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #8B0000;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .package-card {
                margin-bottom: 1.5rem;
            }
            .package-card img {
                height: 200px !important;
            }
            .package-card h4 {
                font-size: 1.5rem !important;
            }
            .package-card .price {
                font-size: 1.75rem !important;
            }
        }
        
        @media (max-width: 640px) {
            .package-card img {
                height: 180px !important;
            }
            .package-card h4 {
                font-size: 1.25rem !important;
            }
            .package-card .price {
                font-size: 1.5rem !important;
            }
            .package-card ul li {
                font-size: 0.875rem !important;
            }
        }
    </style>
</head>
<body class="bg-cream text-neutral font-poppins">
    @include('partials.navbar')

    <!-- HERO -->
    <section id="home" class="relative">
        <img src="https://images.pexels.com/photos/5737405/pexels-photo-5737405.jpeg" class="w-full h-[580px] object-cover" />
        <div class="absolute inset-0 bg-black/45 flex items-center">
            <div class="max-w-7xl mx-auto px-6 text-white">
                <div class="w-full md:w-2/3 lg:w-1/2">
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">Bakso Bunderan Ciomas</h2>
                    <p class="mb-6 text-lg">Gurih, halal, dan favorit keluarga sejak lama. Cita rasa autentik yang memanjakan lidah Anda.</p>
                    <div class="flex gap-4">
        
                        <a href="#menu" class="bg-red-600 px-6 py-3 rounded-md font-semibold hover:bg-red-700">LIHAT MENU</a>
                        <a href="#lokasi" class="bg-pink-300 text-black px-6 py-3 rounded-md font-semibold hover:bg-pink-400">LOKASI KAMI</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PAKET ACARA -->
    <section id="paket" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-4xl font-bold text-center mb-4">PAKET ACARA</h3>
            <p class="text-center mb-12 text-lg text-gray-600">Pilihan paket terbaik untuk acara spesial Anda</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- PAKET A -->
                <div class="package-card bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="h-64 overflow-hidden bg-gray-50">
                        <img src="https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg" 
                             alt="Paket A" 
                             class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold animate-pulse">
                                DISKON 17%
                            </span>
                            <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                                HEMAT
                            </span>
                        </div>
                        <h4 class="text-2xl font-bold mb-2 text-gray-800">Paket A</h4>
                        <p class="text-gray-600 mb-4">Pilihan hemat untuk acara keluarga dengan menu lengkap</p>
                        <ul class="space-y-3 text-gray-700 mb-6">
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Bakso Urat Special</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Mie Ayam Kampung</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Es Teh Manis</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Sambal & Kerupuk</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Alat Makan Lengkap</span>
                            </li>
                        </ul>
                        
                        <button onclick="pilihPaket('A')" 
                                class="w-full bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-700 transition duration-300">
                            Lihat Detail
                        </button>
                    </div>
                </div>

                <!-- PAKET B -->
                <div class="package-card bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="h-64 overflow-hidden bg-gray-50">
                        <img src="https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg" 
                             alt="Paket B" 
                             class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold animate-pulse">
                                DISKON 20%
                            </span>
                            <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                                HEMAT
                            </span>
                        </div>
                        <h4 class="text-2xl font-bold mb-2 text-gray-800">Paket B</h4>
                        <p class="text-gray-600 mb-4">Paket lengkap untuk acara spesial dengan menu premium</p>
                        <ul class="space-y-3 text-gray-700 mb-6">
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Bakso Tulang & Sum-sum</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Mie Ayam Special</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Es Campur</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Sambal Ikan & Kerupuk Udang</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Alat Makan Premium</span>
                            </li>
                        </ul>
                        
                        <button onclick="pilihPaket('B')" 
                                class="w-full bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-700 transition duration-300">
                            Lihat Detail
                        </button>
                    </div>
                </div>

                <!-- PAKET C -->
                <div class="package-card bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="h-64 overflow-hidden bg-gray-50">
                        <img src="https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg" 
                             alt="Paket C" 
                             class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold animate-pulse">
                                DISKON 25%
                            </span>
                            <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                                SUPER HEMAT
                            </span>
                        </div>
                        <h4 class="text-2xl font-bold mb-2 text-gray-800">Paket C</h4>
                        <p class="text-gray-600 mb-4">Paket premium untuk acara besar dengan menu komplit</p>
                        <ul class="space-y-3 text-gray-700 mb-6">
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Bakso Komplit Premium</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Mie Ayam + Kwetiau Goreng</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Es Teh & Jus Buah</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Sambal Premium & Krupuk Komplit</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 mt-1">✓</span>
                                <span>Alat Makan & Dekorasi Meja</span>
                            </li>
                        </ul>
                        
                        <button onclick="pilihPaket('C')" 
                                class="w-full bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-700 transition duration-300">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT BBC HALAL -->
    <section class="py-20 bg-[#EFE1D1a]">
        <div class="max-w-7xl mx-auto px-6 space-y-12">

            <!-- CARD 1 - Image Left, Text Right -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden fade-up">
                <div class="grid md:grid-cols-2 gap-8 items-center p-8 md:p-12">
                    <!-- Left: Image -->
                    <div class="flex justify-center order-1 md:order-1">
                        <img src="https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg" alt="Bakso Bunderan Ciomas" class="w-full h-auto rounded-2xl shadow-lg max-w-sm">
                    </div>

                    <!-- Right: Text Content -->
                    <div class="order-2 md:order-2">
                        <h3 class="text-3xl font-bold mb-4 text-[#3a2a1a] flex items-center gap-2">
                            BAKSO BUNDERAN CIOMAS
                            <span class="text-2xl">🔱</span>
                        </h3>
                        <p class="text-gray-700 mb-4 leading-relaxed text-justify">
                            Berdiri sejak 12 Februari 2025 yang lalu setiap hari melayani pelanggan setia di Diaol & Grobak. Kami menghadirkan Bakso Tulang & Sum-sum dengan bumbu rahasia dan cita rasa yang autentik. Dari influencer hingga pengusaha cita mulai dikenal semua kalangan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CARD 2 - Image Right, Text Left -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden fade-up">
                <div class="grid md:grid-cols-2 gap-8 items-center p-8 md:p-12">

                    <!-- Left: Text Content -->
                    <div class="order-2 md:order-1">
                        <h3 class="text-3xl font-bold mb-4 text-[#3a2a1a] flex items-center gap-2">
                            BAKSO BUNDERAN CIOMAS
                            <span class="text-2xl">🔱</span>
                        </h3>
                        <p class="text-gray-700 mb-4 leading-relaxed text-justify">
                            Setiap porsi bakso kami dibuat dengan dedikasi penuh menggunakan bahan-bahan pilihan berkualitas tinggi. Proses produksi yang ketat memastikan setiap bakso yang kami sajikan memiliki cita rasa yang konsisten, tekstur yang sempurna, dan selalu higienis. Kepuasan pelanggan adalah prioritas utama kami.
                        </p>
                    </div>

                    <!-- Right: Image -->
                    <div class="flex justify-center order-1 md:order-2">
                        <img src="https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg" alt="Bakso Bunderan Ciomas" class="w-full h-auto rounded-2xl shadow-lg max-w-sm">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- MENU REKOMENDASI -->
    @if($recommendedItems->count() > 0)
    <section class="py-20 bg-[#EFE1D1a]">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-4xl font-bold text-center mb-4">Menu Rekomendasi</h3>
            <p class="text-center mb-12 text-lg text-gray-700">Menu pilihan kami yang paling laris dan favorit pelanggan</p>
            
            <!-- SLIDER REKOMENDASI -->
            <div class="rekomendasi-slider mb-8">
                <div class="rekomendasi-track">
                    @foreach($recommendedItems->take(6) as $item) <!-- Take more items for sliding -->
                    <div class="rekomendasi-item bg-[#f5e9d8] rounded-3xl shadow-lg overflow-hidden hover:shadow-xl transition">
                        <div class="h-[280px] overflow-hidden">
                            <img src="{{ $item->image_path ? asset('storage/' . $item->image_path) : 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg' }}" alt="{{ $item->name }}" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        </div>
                        <div class="p-6">
                            <h5 class="text-2xl font-bold mb-2">{{ $item->name }}</h5>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($item->description, 60) }}</p>
                            
                            <!-- Delivery Apps for Recommended Menu -->
                            <div class="mb-4">
                                <p class="text-xs text-gray-600 mb-2 text-center">Pesan melalui:</p>
                                <div class="flex justify-center gap-2">
                                    <a href="https://shopee.co.id/food" target="_blank" 
                                       class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center hover:bg-orange-600 transition">
                                        <i class="fas fa-shopping-bag text-white text-sm"></i>
                                    </a>
                                    <a href="https://food.grab.com/id/id/" target="_blank" 
                                       class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center hover:bg-green-600 transition">
                                        <i class="fas fa-motorcycle text-white text-sm"></i>
                                    </a>
                                    <a href="https://wa.me/6281234567890" target="_blank" 
                                       class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center hover:bg-green-700 transition">
                                        <i class="fab fa-whatsapp text-white text-sm"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <button onclick="bukaModalOrder({{ $item->id }}, '{{ addslashes($item->name) }}')" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-700 transition">Lihat Detail</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- TOMBOL LIHAT MENU -->
            <div class="text-center">
                <a href="#menu" class="bg-pink-400 text-black px-8 py-3 rounded-lg font-bold text-lg hover:bg-pink-500 transition inline-block">Lihat menu</a>
            </div>
        </div>
    </section>
    @endif

    <!-- MENU BAKSO BUNDERAN CIOMAS -->
    <section id="menu" class="py-32 bg-[#EFE1D1a]">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-4xl font-bold text-center mb-6">Menu Bakso Bunderan Ciomas</h3>
            <p class="text-center mb-12 text-lg text-gray-700">Nikmati berbagai menu bakso lezat kami yang gurih dan menggugah selera</p>
            
            <!-- FILTER BUTTONS -->
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                <button class="filter-btn active bg-red-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-red-700 transition" data-filter="all">Semua</button>
                @foreach(['bakso', 'mie', 'paket', 'minuman'] as $category)
                <button class="filter-btn bg-gray-300 text-gray-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-400 transition" data-filter="{{ $category }}">
                    {{ ucfirst($category) }}
                </button>
                @endforeach
            </div>
            
            <!-- GRID MENU 2x2 -->
            <div class="grid md:grid-cols-2 gap-10" id="menuContainer">
                @include('partials.menu-items')
            </div>
        </div>
    </section>

    <!-- TESTIMONI -->
    <section id="testimoni" class="py-32 bg-[#EFE1D1a]">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-4xl font-bold text-center mb-16">Testimoni Pelanggan</h3>
            
            <!-- TOMBOL BUKA FORM (POPUP) -->
            <div class="mb-8 text-center">
                <button onclick="bukaModalTestimoni()" class="bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700">+ Tambah Testimoni</button>
            </div>
            
            <!-- DAFTAR TESTIMONI -->
            <div class="grid md:grid-cols-3 gap-8" id="daftarTestimoni">
                @foreach($testimonials as $testimonial)
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                    <div class="mb-4">
                        <p class="text-gray-700 mb-4 text-lg">"{{ $testimonial->content }}"</p>
                        <div class="flex justify-between items-center">
                            <span class="block font-semibold">– {{ $testimonial->customer_name }}</span>
                            <span class="text-amber-500 font-semibold">
                                @for($i = 0; $i < 5; $i++)
                                    @if($i < $testimonial->rating) ★ @else ☆ @endif
                                @endfor
                            </span>
                        </div>
                        @if($testimonial->admin_reply)
                        <div class="mt-4 p-3 bg-red-50 rounded-lg border-l-4 border-red-600">
                            <p class="text-sm font-semibold text-red-600 mb-1">Balasan:</p>
                            <p class="text-sm text-gray-700">{{ $testimonial->admin_reply }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- LOKASI -->
    <section id="lokasi" class="py-32 bg-[#EFE1D1a]">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-4xl font-bold text-center mb-20">Lokasi Bakso Bunderan Ciomas</h3>
            
            <!-- Main Location with Google Maps -->
            <div class="bg-white rounded-3xl shadow-xl p-10 mb-12">
                <div class="text-center mb-8">
                    <h4 class="text-3xl font-bold text-gray-800 mb-4">🍜 Bakso Bunderan Ciomas</h4>
                    <p class="text-lg text-gray-600 mb-2">Jl. Raya Ciomas No. 45, Kec. Ciomas, Kab. Bogor, Jawa Barat 16610</p>
                    <p class="text-gray-600 mb-6">📞 0812-1234-5678 | ⏰ 09:00 - 22:00 WIB</p>
                    <a href="https://maps.google.com/?q=Bakso+Bunderan+Ciomas" 
                       target="_blank" 
                       class="inline-flex items-center bg-primary text-white px-8 py-4 rounded-lg font-semibold hover:bg-primary-dark transition text-lg">
                        <i class="fas fa-map-marker-alt mr-3"></i>
                        Buka di Google Maps
                    </a>
                </div>
                
                <!-- Embedded Google Maps -->
                <div class="h-[400px] rounded-2xl overflow-hidden shadow-lg">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.1234567890!2d106.7890123!3d-6.5678901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5f2e5f2e5f2%3A0x1234567890abcdef!2sBakso+Bunderan+Ciomas!5e0!3m2!1sen!2sid!4v1234567890"
                        class="w-full h-full border-0" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- Additional Branches -->
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h5 class="text-xl font-bold mb-3">🏪 Pondok Cengek 2</h5>
                    <p class="text-gray-600 mb-4">Jl. Pondok Cengek Raya No. 12, Bogor</p>
                    <a href="https://maps.google.com/?q=Pondok+Cengek+2+Bogor" 
                       target="_blank" 
                       class="text-primary hover:text-primary-dark font-medium">
                        <i class="fas fa-directions mr-2"></i>Petunjuk Arah
                    </a>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h5 class="text-xl font-bold mb-3">🏡 Saung Jurasep</h5>
                    <p class="text-gray-600 mb-4">Jl. Jurasep No. 88, Ciomas, Bogor</p>
                    <a href="https://maps.google.com/?q=Saung+Jurasep+Ciomas" 
                       target="_blank" 
                       class="text-primary hover:text-primary-dark font-medium">
                        <i class="fas fa-directions mr-2"></i>Petunjuk Arah
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- KONTAK KAMI -->
    <section class="py-32 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6">
            <h3 class="text-4xl font-bold text-center mb-16">KONTAK KAMI</h3>
            
            @if(session('contact_success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-lg mb-6">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3 text-xl"></i>
                    <span class="font-medium">{{ session('contact_success') }}</span>
                </div>
            </div>
            @endif

            @if(session('contact_error'))
            <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-lg mb-6">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-3 text-xl"></i>
                    <span class="font-medium">{{ session('contact_error') }}</span>
                </div>
            </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST" class="bg-white rounded-3xl shadow-xl p-10">
                @csrf
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-user mr-2"></i>NAMA
                        </label>
                        <input type="text" 
                               name="name" 
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition"
                               placeholder="Masukkan nama lengkap Anda">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-envelope mr-2"></i>EMAIL
                        </label>
                        <input type="email" 
                               name="email" 
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition"
                               placeholder="email@example.com">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">
                        <i class="fas fa-phone mr-2"></i>NOMOR WA
                    </label>
                    <input type="tel" 
                           name="phone" 
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition"
                           placeholder="0812-3456-7890">
                </div>

                <div class="mb-8">
                    <label class="block text-gray-700 font-medium mb-2">
                        <i class="fas fa-message mr-2"></i>PESAN
                    </label>
                    <textarea name="message" 
                              rows="5" 
                              required
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition resize-none"
                              placeholder="Tulis pesan Anda di sini..."></textarea>
                </div>

                <button type="submit" 
                        class="w-full bg-primary text-white py-4 px-6 rounded-lg font-semibold hover:bg-primary-dark transition text-lg flex items-center justify-center">
                    <i class="fas fa-paper-plane mr-3"></i>
                    KIRIM PESAN
                </button>
            </form>

            <!-- Quick Contact Info -->
            <div class="grid md:grid-cols-3 gap-6 mt-12">
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone-alt text-primary text-xl"></i>
                    </div>
                    <h5 class="font-semibold mb-2">Telepon</h5>
                    <p class="text-gray-600">0812-1234-5678</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fab fa-whatsapp text-green-600 text-xl"></i>
                    </div>
                    <h5 class="font-semibold mb-2">WhatsApp</h5>
                    <p class="text-gray-600">0812-1234-5678</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-red-600 text-xl"></i>
                    </div>
                    <h5 class="font-semibold mb-2">Email</h5>
                    <p class="text-gray-600">info@baksobunderanciomas.com</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Add to Cart Modal -->
    <div id="addToCartModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl p-6 w-full max-w-md mx-4">
            <h3 class="text-xl font-semibold mb-4">Tambah ke Keranjang</h3>
            <form id="addToCartForm">
                <input type="hidden" id="modalMenuItemId">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
                    <input type="number" id="modalQuantity" min="1" value="1" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Catatan (opsional)</label>
                    <textarea id="modalNotes" rows="3" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                              placeholder="Contoh: Tidak pakai sambal, extra pedas, dll."></textarea>
                </div>
                <div class="flex gap-3">
                    <button type="submit" class="flex-1 bg-red-600 text-white py-2 rounded-lg font-semibold hover:bg-red-700 transition">
                        Tambah ke Keranjang
                    </button>
                    <button type="button" onclick="closeAddToCartModal()" 
                            class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg font-semibold hover:bg-gray-300 transition">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    @include('modals.order')
    @include('modals.testimonial')

    <script>
        // Filter Menu
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.dataset.filter;
                
                // Update active button
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('active', 'bg-red-600', 'text-white');
                    btn.classList.add('bg-gray-300', 'text-gray-700');
                });
                this.classList.add('active', 'bg-red-600', 'text-white');
                
                // Show loading state
                const menuContainer = document.getElementById('menuContainer');
                menuContainer.innerHTML = '<div class="col-span-2 text-center py-8"><i class="fas fa-spinner fa-spin text-3xl text-red-600"></i><p class="mt-4 text-gray-600">Memuat menu...</p></div>';
                
                // Ajax filter
                fetch(`/filter-menu?category=${filter}`)
                    .then(response => response.json())
                    .then(data => {
                        menuContainer.innerHTML = data.html;
                        
                        // Add fade-in animation to new items
                        const items = menuContainer.querySelectorAll('.menu-item');
                        items.forEach((item, index) => {
                            item.style.opacity = '0';
                            item.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                                item.style.opacity = '1';
                                item.style.transform = 'translateY(0)';
                            }, index * 100);
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        menuContainer.innerHTML = '<div class="col-span-2 text-center py-8 text-red-600"><i class="fas fa-exclamation-triangle text-3xl"></i><p class="mt-4">Terjadi kesalahan saat memuat menu</p></div>';
                    });
            });
        });

        // ========== FUNGSI PAKET ==========
        function pilihPaket(paketType) {
            // Redirect to package detail page
            window.location.href = `/paket/${paketType.toLowerCase()}`;
        }

        // ========== FUNGSI KERANJANG ==========
        function addToCart(menuItemId) {
            // Ultra-fast auth check
            @guest
            showLoginModal();
            return;
            @endauth
            
            // Instant modal show
            showAddToCartModal(menuItemId);
        }

        function showAddToCartModal(menuItemId) {
            document.getElementById('modalMenuItemId').value = menuItemId;
            document.getElementById('modalQuantity').value = 1;
            document.getElementById('modalNotes').value = '';
            document.getElementById('addToCartModal').classList.remove('hidden');
            // Focus input for better UX
            setTimeout(() => {
                document.getElementById('modalQuantity')?.focus();
            }, 100);
        }

        function closeAddToCartModal() {
            document.getElementById('addToCartModal').classList.add('hidden');
            document.getElementById('addToCartForm').reset();
        }

        function showLoginModal() {
            const modalHtml = `
                <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white rounded-2xl p-6 w-full max-w-md mx-4">
                        <div class="text-center mb-4">
                            <i class="fas fa-user-circle text-6xl text-red-600 mb-3"></i>
                            <h3 class="text-xl font-semibold mb-2">Login Diperlukan</h3>
                            <p class="text-gray-600 mb-4">Login untuk menambahkan ke keranjang</p>
                        </div>
                        <div class="flex gap-3">
                            <button onclick="window.location.href='{{ route("user.login") }}'" 
                                    class="flex-1 bg-red-600 text-white py-2 rounded-lg font-semibold hover:bg-red-700 transition">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                Login
                            </button>
                            <button onclick="closeLoginModal()" 
                                    class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg font-semibold hover:bg-gray-300 transition">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            `;
            
            document.body.insertAdjacentHTML('beforeend', modalHtml);
        }

        function closeLoginModal() {
            const modal = document.getElementById('loginModal');
            if (modal) modal.remove();
        }

        // Ultra-fast cart update
        function updateCartCountFast(newCount = null) {
            const cartCount = document.getElementById('cartCount');
            if (cartCount) {
                if (newCount !== null) {
                    cartCount.textContent = newCount;
                }
                // Quick animation
                cartCount.style.transform = 'scale(1.2)';
                setTimeout(() => {
                    cartCount.style.transform = 'scale(1)';
                }, 200);
            }
        }

        // Fast notification system
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            const bgColor = type === 'error' ? 'bg-red-500' : 'bg-green-500';
            const icon = type === 'error' ? 'fas fa-exclamation-circle' : 'fas fa-check-circle';
            
            notification.className = `fixed top-20 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center gap-2`;
            notification.style.transform = 'translateX(100%)';
            notification.innerHTML = `<i class="${icon}"></i><span>${message}</span>`;
            document.body.appendChild(notification);
            
            // Slide in
            requestAnimationFrame(() => {
                notification.style.transform = 'translateX(0)';
                notification.style.transition = 'transform 0.3s ease';
            });
            
            // Auto remove
            setTimeout(() => {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => notification.remove(), 300);
            }, 2000);
        }

        // Ultra-fast form handler
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('addToCartForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const menuItemId = parseInt(document.getElementById('modalMenuItemId').value);
                    const quantity = parseInt(document.getElementById('modalQuantity').value);
                    const notes = document.getElementById('modalNotes').value.trim();
                    
                    // Instant validation
                    if (!menuItemId || quantity < 1 || quantity > 99) {
                        showNotification('Jumlah: 1-99', 'error');
                        return;
                    }
                    
                    const submitBtn = form.querySelector('button[type="submit"]');
                    const originalText = submitBtn.innerHTML;
                    
                    // Minimal loading state
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';
                    submitBtn.disabled = true;
                    
                    // Ultra-fast fetch with minimal timeout
                    const controller = new AbortController();
                    const timeoutId = setTimeout(() => controller.abort(), 5000); // 5 second timeout
                    
                    fetch('/keranjang/add', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            menu_item_id: menuItemId,
                            quantity: quantity,
                            notes: notes || null
                        }),
                        signal: controller.signal
                    })
                    .then(response => {
                        clearTimeout(timeoutId);
                        if (!response.ok) throw new Error(response.status);
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            closeAddToCartModal();
                            showNotification(data.message);
                            updateCartCountFast(data.cart_count);
                            
                            // Instant redirect - 800ms
                            setTimeout(() => {
                                window.location.href = '/keranjang';
                            }, 800);
                        } else {
                            if (data.redirect && confirm('Login dulu?')) {
                                window.location.href = data.redirect;
                                return;
                            }
                            showNotification(data.message || 'Gagal', 'error');
                        }
                    })
                    .catch(error => {
                        clearTimeout(timeoutId);
                        if (error.name === 'AbortError') {
                            showNotification('Timeout', 'error');
                        } else {
                            showNotification('Error: ' + error.message, 'error');
                        }
                    })
                    .finally(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    });
                });
            }

            // Initial cart count
            @auth
            fetch('/api/cart-count', {
                headers: { 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(data => updateCartCountFast(data.count))
            .catch(() => {}); // Silent fail
            @endauth
        });

        // ========== FUNGSI ORDER ==========
        let orderData = {
            nama: '',
        };

        function bukaModalOrder(namaMenu) {
            orderData.nama = namaMenu;
            document.getElementById('menuOrderName').textContent = `${namaMenu}`;
            document.getElementById('modalOrder').classList.remove('hidden');
        }

        function tutupModalOrder() {
            document.getElementById('modalOrder').classList.add('hidden');
        }

        function pesanKeGofood() {
            alert(`Pesan ${orderData.nama} via Gofood\n\nAnda akan diarahkan ke aplikasi Gofood untuk menyelesaikan pesanan.`);
            window.open('https://gofood.co.id', '_blank');
            tutupModalOrder();
        }

        function pesanKeShopee() {
            alert(`Pesan ${orderData.nama} via Shopeefood\n\nAnda akan diarahkan ke aplikasi Shopeefood untuk menyelesaikan pesanan.`);
            window.open('https://shopeefood.co.id', '_blank');
            tutupModalOrder();
        }

        function pesanDirect() {
            const nomorWA = '6281234567890';
            const pesan = `Halo, saya ingin memesan ${orderData.nama} - Rp ${orderData.harga.toLocaleString('id-ID')}`;
            window.open(`https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`, '_blank');
            tutupModalOrder();
        }

        // Tutup modal saat klik di luar
        document.getElementById('modalOrder').addEventListener('click', function(e) {
            if (e.target === this) {
                tutupModalOrder();
            }
        });

        // ========== FUNGSI TESTIMONI ==========
        function bukaModalTestimoni() {
            document.getElementById('modalTestimoni').classList.remove('hidden');
        }

        function tutupModalTestimoni() {
            document.getElementById('modalTestimoni').classList.add('hidden');
        }

        async function submitTestimonial() {
            const formData = {
                customer_name: document.getElementById('testimoniBahan').value,
                content: document.getElementById('testimoniText').value,
                rating: document.getElementById('testimoniRating').value,
                _token: '{{ csrf_token() }}'
            };
            
            try {
                const response = await fetch('/testimonial', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(formData)
                });
                
                const result = await response.json();
                alert(result.message);
                
                if (result.success) {
                    tutupModalTestimoni();
                    location.reload();
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim testimoni.');
            }
        }

        // Modal testimoni close on click outside
        document.getElementById('modalTestimoni').addEventListener('click', function(e) {
            if (e.target === this) {
                tutupModalTestimoni();
            }
        });

        // ========== AUTO SLIDER REKOMENDASI ==========
        let currentSlide = 0;
        const rekomendasiTrack = document.querySelector('.rekomendasi-track');
        const rekomendasiItems = document.querySelectorAll('.rekomendasi-item');
        const totalSlides = rekomendasiItems.length - 3; // Show 3 items at a time

        function slideRekomendasi() {
            currentSlide = (currentSlide + 1) % totalSlides;
            const translateX = -currentSlide * (100 / 3); // Move by 1/3 of container width
            rekomendasiTrack.style.transform = `translateX(${translateX}%)`;
        }

        // Auto slide every 3 seconds (1 second pause + 2 seconds slide)
        setInterval(slideRekomendasi, 3000);

        // ========== FADE UP ANIMATION ==========
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all elements with fade-up class
        document.querySelectorAll('.fade-up').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>