<!-- MODAL TESTIMONI -->
<div id="modalTestimoni" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-lg w-full mx-4">
        <h3 class="text-2xl font-bold mb-4">Berikan Testimoni Anda</h3>
        <div class="flex flex-col gap-4">
            <input type="text" id="testimoniBahan" placeholder="Nama Anda" class="p-3 border-2 border-gray-300 rounded-lg focus:border-red-600 focus:outline-none text-lg" />
            <textarea id="testimoniText" placeholder="Tuliskan testimoni Anda..." class="p-3 border-2 border-gray-300 rounded-lg focus:border-red-600 focus:outline-none h-28 resize-none text-lg"></textarea>
            <div class="flex items-center gap-3">
                <label class="font-semibold">Rating:</label>
                <select id="testimoniRating" class="p-2 border-2 border-gray-300 rounded-lg focus:outline-none">
                    <option value="5">5 — ★★★★★</option>
                    <option value="4">4 — ★★★★☆</option>
                    <option value="3">3 — ★★★☆☆</option>
                    <option value="2">2 — ★★☆☆☆</option>
                    <option value="1">1 — ★☆☆☆☆</option>
                </select>
            </div>
            <div class="flex gap-3">
                <button onclick="submitTestimonial()" class="flex-1 bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-700">KIRIM TESTIMONI</button>
                <button onclick="tutupModalTestimoni()" class="flex-1 bg-gray-300 text-gray-700 py-3 rounded-lg font-semibold">BATAL</button>
            </div>
        </div>
    </div>
</div>