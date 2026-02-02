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
                            BAKSO BUNDERAN 
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
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-red-600">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                <button onclick="bukaModalOrder({{ $item->id }}, '{{ addslashes($item->name) }}', {{ $item->price }})" class="bg-red-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-700 transition">Pesan</button>
                            </div>
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

    <!-- LOKASI (2 CABANG) -->
    <section id="lokasi" class="py-32 bg-[#
    EFE1D1a]">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-4xl font-bold text-center mb-20">Lokasi Bakso Bunderan Ciomas</h3>
            <div class="grid md:grid-cols-2 gap-12">
                @foreach($branches as $branch)
                <div class="bg-[#f5e9d8] rounded-3xl shadow-lg p-10">
                    <h5 class="font-bold text-2xl mb-4">{{ $branch->name }}</h5>
                    <p class="mb-8 text-gray-700 text-lg">{{ $branch->address }}</p>
                    @if($branch->phone)
                    <p class="mb-4 text-gray-700"><strong>Telepon:</strong> {{ $branch->phone }}</p>
                    @endif
                    @if($branch->operational_hours)
                    <p class="mb-4 text-gray-700"><strong>Jam Operasional:</strong> {{ $branch->operational_hours }}</p>
                    @endif
                    <div class="h-[350px] rounded-2xl overflow-hidden">
                        <iframe src="{{ $branch->google_maps_url }}" class="w-full h-full border-0" loading="lazy"></iframe>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </section>

    <!-- KONTAK -->
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-4xl font-bold text-center mb-16">Kontak Kami</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- WhatsApp -->
                <div class="bg-white rounded-3xl shadow-lg p-8 text-center hover:shadow-xl transition">
                    <div class="text-6xl text-green-500 mb-4 contact-icon">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h5 class="text-2xl font-bold mb-2">WhatsApp</h5>
                    <p class="text-gray-700 mb-4">Hubungi kami untuk pemesanan atau informasi</p>
                    <a href="https://wa.me/6281234567890" target="_blank" class="bg-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600 transition inline-block">Chat Sekarang</a>
                </div>

                <!-- Instagram -->
                <div class="bg-white rounded-3xl shadow-lg p-8 text-center hover:shadow-xl transition">
                    <div class="text-6xl text-pink-500 mb-4 contact-icon">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <h5 class="text-2xl font-bold mb-2">Instagram</h5>
                    <p class="text-gray-700 mb-4">Ikuti kami untuk update menu dan promo terbaru</p>
                    <a href="https://instagram.com/baksobunderanciomas" target="_blank" class="bg-pink-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-pink-600 transition inline-block">Follow Kami</a>
                </div>

                <!-- Facebook -->
                <div class="bg-white rounded-3xl shadow-lg p-8 text-center hover:shadow-xl transition">
                    <div class="text-6xl text-blue-600 mb-4 contact-icon">
                        <i class="fab fa-facebook"></i>
                    </div>
                    <h5 class="text-2xl font-bold mb-2">Facebook</h5>
                    <p class="text-gray-700 mb-4">Bergabung dengan komunitas penggemar bakso kami</p>
                    <a href="https://facebook.com/baksobunderanciomas" target="_blank" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition inline-block">Like & Share</a>
                </div>

                <!-- Email -->
                <div class="bg-white rounded-3xl shadow-lg p-8 text-center hover:shadow-xl transition">
                    <div class="text-6xl text-red-500 mb-4 contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5 class="text-2xl font-bold mb-2">Email</h5>
                    <p class="text-gray-700 mb-4">Kirim pesan untuk kerjasama atau pertanyaan</p>
                    <a href="mailto:info@baksobunderanciomas.com" class="bg-red-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-600 transition inline-block">Kirim Email</a>
                </div>
            </div>
        </div>
    </section>

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
                
                // Ajax filter
                fetch(`/filter-menu?category=${filter}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('menuContainer').innerHTML = data.html;
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

        // ========== FUNGSI ORDER ==========
        let orderData = {
            nama: '',
            harga: 0
        };

        function bukaModalOrder(namaMenu, harga) {
            orderData.nama = namaMenu;
            orderData.harga = harga;
            document.getElementById('menuOrderName').textContent = `${namaMenu} - Rp ${harga.toLocaleString('id-ID')}`;
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