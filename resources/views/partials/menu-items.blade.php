@foreach($menuItems as $item)
<div class="menu-item" data-category="{{ $item->category }}">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
        <div class="flex gap-6 p-8">
            <img src="{{ $item->image_path ? asset('storage/' . $item->image_path) : 'https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg' }}" 
                 class="w-40 h-40 object-cover rounded-lg" alt="{{ $item->name }}">
            <div class="flex-1">
                <h4 class="text-xl font-bold mb-3">{{ $item->name }}</h4>
                <p class="text-base text-gray-600 mb-3">{{ $item->description }}</p>
                <div class="flex justify-between items-center">
                    <!-- Delivery Apps -->
                    <div class="flex gap-2">
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
                    <button onclick="addToCart({{ $item->id }})" 
                            class="cart-btn bg-red-600 text-white px-5 py-2 rounded font-semibold hover:bg-red-700 flex items-center gap-2">
                        <i class="fas fa-cart-plus"></i>
                        Keranjang
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach