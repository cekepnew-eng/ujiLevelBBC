<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Saya - Bakso Bunderan Ciomas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-[#EFE1D1] font-poppins">
    @include('partials.navbar')

    <div class="min-h-screen bg-[#EFE1D1] py-8">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <a href="{{ url('/') }}" class="text-gray-600 hover:text-red-600 transition">
                            <i class="fas fa-arrow-left text-xl"></i>
                        </a>
                        <h1 class="text-3xl font-bold text-gray-800">Keranjang Saya</h1>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-shopping-cart text-red-600 text-2xl"></i>
                        <span class="bg-red-600 text-white text-sm px-2 py-1 rounded-full">{{ $cartItems->count() }}</span>
                    </div>
                </div>
            </div>

            @if($cartItems->isEmpty())
            <!-- Empty Cart -->
            <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                <i class="fas fa-shopping-cart text-gray-300 text-6xl mb-4"></i>
                <h2 class="text-2xl font-semibold text-gray-600 mb-2">Keranjang Masih Kosong</h2>
                <p class="text-gray-500 mb-6">Yuk, tambahkan menu favorit Anda ke keranjang!</p>
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition">
                    <i class="fas fa-utensils"></i>
                    Lihat Menu
                </a>
            </div>
            @else
            <!-- Cart Items -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Cart List -->
                <div class="lg:col-span-2 space-y-4">
                    @foreach($cartItems as $item)
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                        <div class="flex gap-4">
                            <img src="{{ $item->menuItem->image_path ?: 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg' }}" 
                                 class="w-24 h-24 object-cover rounded-lg" alt="{{ $item->menuItem->name }}">
                            
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $item->menuItem->name }}</h3>
                                <p class="text-gray-600 text-sm mb-2">{{ $item->menuItem->description }}</p>
                                
                                @if($item->notes)
                                <p class="text-sm text-gray-500 mb-2">
                                    <i class="fas fa-sticky-note"></i> Catatan: {{ $item->notes }}
                                </p>
                                @endif
                                
                                <div class="flex items-center justify-between mt-3">
                                    <div class="flex items-center gap-3">
                                        <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})" 
                                                class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition {{ $item->quantity <= 1 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                                {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                            <i class="fas fa-minus text-xs"></i>
                                        </button>
                                        <span class="font-semibold w-8 text-center">{{ $item->quantity }}</span>
                                        <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})" 
                                                class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center hover:bg-red-700 transition">
                                            <i class="fas fa-plus text-xs"></i>
                                        </button>
                                    </div>
                                    
                                    <div class="text-right">
                                        <p class="text-sm text-gray-500">Rp {{ number_format($item->price, 0, ',', '.') }} x {{ $item->quantity }}</p>
                                        <p class="text-lg font-bold text-red-600">Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <button onclick="removeItem({{ $item->id }})" 
                                    class="text-red-500 hover:text-red-700 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Ringkasan Pesanan</h3>
                        
                        <div class="space-y-3 mb-4">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal ({{ $cartItems->count() }} item)</span>
                                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Biaya Pengiriman</span>
                                <span>Gratis</span>
                            </div>
                            <div class="border-t pt-3">
                                <div class="flex justify-between text-lg font-bold text-gray-800">
                                    <span>Total</span>
                                    <span class="text-red-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <button onclick="checkout()" 
                                    class="w-full bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-700 transition">
                                <i class="fas fa-credit-card mr-2"></i>
                                Checkout
                            </button>
                            
                            <button onclick="clearCart()" 
                                    class="w-full bg-gray-200 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                                <i class="fas fa-trash-alt mr-2"></i>
                                Kosongkan Keranjang
                            </button>
                            
                            <a href="{{ url('/') }}" 
                               class="w-full bg-white border border-gray-300 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-50 transition text-center block">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Lanjut Belanja
                            </a>
                        </div>

                        <!-- Delivery Info -->
                        <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                            <div class="flex items-center gap-2 text-blue-700 mb-2">
                                <i class="fas fa-truck"></i>
                                <span class="font-semibold">Info Pengiriman</span>
                            </div>
                            <p class="text-sm text-blue-600">
                                Pesanan akan dikirim dalam 30-45 menit setelah checkout
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <script>
        function updateQuantity(itemId, newQuantity) {
            if (newQuantity < 1) return;
            
            fetch(`/keranjang/update/${itemId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ quantity: newQuantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function removeItem(itemId) {
            if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
                fetch(`/keranjang/remove/${itemId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }

        function clearCart() {
            if (confirm('Apakah Anda yakin ingin mengosongkan keranjang?')) {
                fetch('/keranjang/clear', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }

        function checkout() {
            alert('Fitur checkout akan segera tersedia!');
        }
    </script>
</body>
</html>
