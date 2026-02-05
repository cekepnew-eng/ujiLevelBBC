<!-- NAVBAR -->
<header class="bg-[#3b1b16] text-white sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex items-center px-6 py-3">
        <div class="flex items-center gap-3">
            <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg" alt="logo" class="w-12 h-12 object-contain rounded" />
            <span class="font-bold text-lg hidden sm:inline">Bakso Bunderan Ciomas</span>
        </div>

        <nav class="flex-1">
            <ul class="hidden md:flex justify-center gap-8 text-sm font-semibold">
                <li><a href="#home" class="hover:underline">HOME</a></li>
                <li><a href="#menu" class="hover:underline">MENU</a></li>
                <li><a href="#lokasi" class="hover:underline">LOKASI</a></li>
                <li><a href="#testimoni" class="hover:underline">TESTIMONI</a></li>
            </ul>
        </nav>

        <div class="flex items-center gap-3">
            <!-- Cart Icon -->
            @auth
            <a href="{{ route('cart.index') }}" class="relative bg-red-600 text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-red-700 flex items-center gap-2">
                <i class="fas fa-shopping-cart"></i>
                <span class="hidden sm:inline">Keranjang</span>
                <span id="cartCount" class="absolute -top-2 -right-2 bg-yellow-400 text-red-600 text-xs w-5 h-5 rounded-full flex items-center justify-center font-bold">0</span>
            </a>
            @else
            <a href="{{ route('user.login') }}" class="bg-red-600 text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-red-700">
                <i class="fas fa-user mr-2"></i>
                Login
            </a>
            @endauth
        </div>
    </div>
</header>