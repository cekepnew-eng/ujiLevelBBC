<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $package['name'] }} - Bakso Bunderan Ciomas</title>
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
        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-cream text-neutral font-poppins">
    @include('partials.navbar')

    <!-- PACKAGE HERO -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left: Product Image -->
                <div class="order-1 lg:order-1">
                    <div class="bg-gray-50 rounded-3xl overflow-hidden shadow-xl">
                        <img src="{{ $package['image'] }}" 
                             alt="{{ $package['name'] }}" 
                             class="w-full h-[400px] lg:h-[500px] object-cover">
                    </div>
                </div>

                <!-- Right: Product Details -->
                <div class="order-2 lg:order-2">
                    <div class="mb-4">
                        <span class="bg-red-600 text-white px-4 py-2 rounded-full text-sm font-bold animate-pulse">
                            DISKON {{ $package['discount'] }}%
                        </span>
                    </div>
                    <h1 class="text-4xl lg:text-5xl font-bold mb-4 text-gray-800">{{ $package['name'] }}</h1>
                    <p class="text-xl text-gray-600 mb-6">{{ $package['description'] }}</p>
                    
                    <div class="mb-6">
                        <p class="text-lg text-gray-600">Porsi: <span class="font-semibold">{{ $package['portions'] }}</span></p>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-xl font-semibold mb-4 text-gray-800">Yang Anda Dapatkan:</h3>
                        <ul class="space-y-3">
                            @foreach($package['features'] as $feature)
                            <li class="flex items-center gap-3">
                                <span class="text-green-500 text-xl">✓</span>
                                <span class="text-gray-700">{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <button onclick="pesanPaket()" 
                                class="flex-1 bg-red-600 text-white py-4 px-8 rounded-lg font-semibold hover:bg-red-700 transition duration-300">
                            <i class="fas fa-shopping-cart mr-2"></i>
                            Pesan Sekarang
                        </button>
                        <button onclick="hubungiKami()" 
                                class="flex-1 bg-green-500 text-white py-4 px-8 rounded-lg font-semibold hover:bg-green-600 transition duration-300">
                            <i class="fas fa-whatsapp mr-2"></i>
                            Hubungi Kami
                        </button>
                        <a href="/" 
                                class="flex-1 bg-gray-600 text-white py-4 px-8 rounded-lg font-semibold hover:bg-gray-700 transition duration-300 text-center">
                            <i class="fas fa-home mr-2"></i>
                            Kembali ke Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PACKAGE DETAILS -->
    <section class="py-20 bg-[#EFE1D1a]">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Detail Paket</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center fade-up">
                    <div class="text-5xl text-red-600 mb-4">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Menu Lengkap</h3>
                    <p class="text-gray-600">Berbagai pilihan bakso dan mie berkualitas tinggi dengan cita rasa autentik</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center fade-up">
                    <div class="text-5xl text-red-600 mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Untuk {{ $package['portions'] }}</h3>
                    <p class="text-gray-600">Cukup untuk acara keluarga, kumpul bersama, atau acara kantor</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center fade-up">
                    <div class="text-5xl text-red-600 mb-4">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Gratis Ongkir</h3>
                    <p class="text-gray-600">Pengantaran gratis untuk area tertentu (minimal order berlaku)</p>
                </div>
            </div>
        </div>
    </section>

    <!-- OTHER PACKAGES -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Paket Lainnya</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @if($package['name'] !== 'Paket A')
                <div class="bg-gray-50 rounded-2xl p-6 hover:shadow-lg transition cursor-pointer" onclick="window.location.href='/paket/a'">
                    <div class="flex items-center gap-4">
                        <img src="https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg" 
                             alt="Paket A" 
                             class="w-24 h-24 rounded-xl object-cover">
                        <div>
                            <h3 class="text-xl font-bold">Paket A</h3>
                            <p class="text-gray-600">50 Porsi - Pilihan hemat untuk acara keluarga</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($package['name'] !== 'Paket B')
                <div class="bg-gray-50 rounded-2xl p-6 hover:shadow-lg transition cursor-pointer" onclick="window.location.href='/paket/b'">
                    <div class="flex items-center gap-4">
                        <img src="https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg" 
                             alt="Paket B" 
                             class="w-24 h-24 rounded-xl object-cover">
                        <div>
                            <h3 class="text-xl font-bold">Paket B</h3>
                            <p class="text-gray-600">75 Porsi - Paket lengkap untuk acara spesial</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($package['name'] !== 'Paket C')
                <div class="bg-gray-50 rounded-2xl p-6 hover:shadow-lg transition cursor-pointer" onclick="window.location.href='/paket/c'">
                    <div class="flex items-center gap-4">
                        <img src="https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg" 
                             alt="Paket C" 
                             class="w-24 h-24 rounded-xl object-cover">
                        <div>
                            <h3 class="text-xl font-bold">Paket C</h3>
                            <p class="text-gray-600">100 Porsi - Paket premium untuk acara besar</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- CONTACT INFO -->
    <section class="py-20 bg-[#EFE1D1a]">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Butuh Bantuan?</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- WhatsApp -->
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                    <div class="text-4xl text-green-500 mb-4">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-2">WhatsApp</h3>
                    <p class="text-gray-600 mb-4">Hubungi kami untuk pemesanan</p>
                    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20bertanya%20tentang%20{{ urlencode($package['name']) }}" 
                       target="_blank" 
                       class="bg-green-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-600 transition inline-block">
                        Chat Sekarang
                    </a>
                </div>

                <!-- Phone -->
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                    <div class="text-4xl text-blue-600 mb-4">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Telepon</h3>
                    <p class="text-gray-600 mb-4">Hubungi langsung</p>
                    <a href="tel:+6281234567890" 
                       class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition inline-block">
                        Panggil Sekarang
                    </a>
                </div>

                <!-- Email -->
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                    <div class="text-4xl text-red-500 mb-4">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Email</h3>
                    <p class="text-gray-600 mb-4">Kirim pesan</p>
                    <a href="mailto:info@baksobunderanciomas.com?subject=Pertanyaan%20{{ urlencode($package['name']) }}" 
                       class="bg-red-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-600 transition inline-block">
                        Kirim Email
                    </a>
                </div>

                <!-- Location -->
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
                    <div class="text-4xl text-purple-600 mb-4">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Lokasi</h3>
                    <p class="text-gray-600 mb-4">Kunjungi kami</p>
                    <a href="#lokasi" 
                       class="bg-purple-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-purple-700 transition inline-block">
                        Lihat Lokasi
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

    <script>
        // ========== FUNGSI PAKET ==========
        function pesanPaket() {
            const nomorWA = '6281234567890';
            const pesan = `Halo, saya ingin memesan {{ $package['name'] }} - Rp {{ number_format($package['price'], 0, ',', '.') }} ({{ $package['portions'] }})`;
            window.open(`https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`, '_blank');
        }

        function hubungiKami() {
            const nomorWA = '6281234567890';
            const pesan = `Halo, saya ingin bertanya tentang {{ $package['name'] }}`;
            window.open(`https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`, '_blank');
        }

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
