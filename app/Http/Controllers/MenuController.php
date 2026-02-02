<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $menuItems = MenuItem::latest()->paginate(10);
        $categories = ['bakso', 'mie', 'paket', 'minuman'];
        
        return view('admin.menu.index', compact('menuItems', 'categories'));
    }

    public function create()
    {
        $categories = ['bakso', 'mie', 'paket', 'minuman'];
        return view('admin.menu.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:bakso,mie,paket,minuman',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'is_recommended' => 'boolean',
            'is_active' => 'boolean'
        ]);
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('menu-items', 'public');
            $validated['image_path'] = $path;
        }
        
        MenuItem::create($validated);
        
        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu item berhasil ditambahkan.');
    }

    public function edit(MenuItem $menuItem)
    {
        $categories = ['bakso', 'mie', 'paket', 'minuman'];
        return view('admin.menu.edit', compact('menuItem', 'categories'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:bakso,mie,paket,minuman',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'is_recommended' => 'boolean',
            'is_active' => 'boolean'
        ]);
        
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($menuItem->image_path) {
                Storage::disk('public')->delete($menuItem->image_path);
            }

            $path = $request->file('image')->store('menu-items', 'public');
            $validated['image_path'] = $path;
        }
        
        $menuItem->update($validated);
        
        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu item berhasil diperbarui.');
    }

    public function destroy(MenuItem $menuItem)
    {
        if ($menuItem->image_path) {
            Storage::disk('public')->delete($menuItem->image_path);
        }

        $menuItem->delete();

        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu item berhasil dihapus.');
    }

    public function updateOrder(Request $request)
    {
        foreach ($request->order as $index => $id) {
            MenuItem::where('id', $id)->update(['order' => $index]);
        }
        
        return response()->json(['success' => true]);
    }
}