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
                    <span class="text-2xl font-bold text-amber-700">
                        Rp {{ number_format($item->price, 0, ',', '.') }}
                    </span>
                    <button onclick="bukaModalOrder('{{ $item->name }}', {{ $item->price }})" 
                            class="bg-red-600 text-white px-5 py-2 rounded font-semibold hover:bg-red-700">
                        PESAN
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach