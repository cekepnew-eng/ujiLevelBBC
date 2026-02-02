<!-- MODAL ORDER - PILIH DELIVERY -->
<div id="modalOrder" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full mx-4">
        <h3 class="text-2xl font-bold mb-2">Pilih Metode Pemesanan</h3>
        <p id="menuOrderName" class="text-gray-600 mb-6">Menu Pilihan</p>
        
        <div class="space-y-3 mb-6">
            <button onclick="pesanKeGofood()" class="w-full bg-green-500 hover:bg-green-600 text-white py-4 rounded-lg font-semibold text-lg transition">
                🚗 Pesan via Gofood
            </button>
            <button onclick="pesanKeShopee()" class="w-full bg-red-500 hover:bg-red-600 text-white py-4 rounded-lg font-semibold text-lg transition">
                🛵 Pesan via Shopeefood
            </button>
            <button onclick="pesanDirect()" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-4 rounded-lg font-semibold text-lg transition">
                ☎️ Hubungi Langsung
            </button>
        </div>
        
        <button onclick="tutupModalOrder()" class="w-full bg-gray-300 hover:bg-gray-400 text-gray-700 py-3 rounded-lg font-semibold transition">
            Batal
        </button>
    </div>
</div>
