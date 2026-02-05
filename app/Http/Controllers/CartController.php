<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }
        
        $cartItems = Cart::with('menuItem')
            ->where('user_id', Auth::id())
            ->get();

        $total = $cartItems->sum(function($item) {
            return $item->quantity * $item->price;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        // Ultra-fast auth check
        if (!Auth::id()) {
            return response()->json([
                'success' => false, 
                'message' => 'Login required',
                'redirect' => route('user.login')
            ], 401);
        }
        
        // Minimal validation for speed
        $menuItemId = (int) $request->menu_item_id;
        $quantity = (int) $request->quantity;
        $notes = $request->notes ? trim($request->notes) : null;
        
        // Quick validation
        if (!$menuItemId || $quantity < 1 || $quantity > 99) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid input'
            ], 400);
        }

        try {
            // Cache menu item for speed
            $cacheKey = "menu_item_{$menuItemId}";
            $menuItem = cache()->remember($cacheKey, 300, function() use ($menuItemId) {
                return \DB::table('menu_items')
                    ->select('id', 'name', 'price')
                    ->where('id', $menuItemId)
                    ->where('is_available', 1)
                    ->first();
            });
            
            if (!$menuItem) {
                return response()->json([
                    'success' => false,
                    'message' => 'Menu tidak tersedia'
                ], 404);
            }
            
            // Use raw DB for maximum speed
            $exists = \DB::table('carts')
                ->where('user_id', Auth::id())
                ->where('menu_item_id', $menuItemId)
                ->exists();
            
            if ($exists) {
                // Update existing
                \DB::table('carts')
                    ->where('user_id', Auth::id())
                    ->where('menu_item_id', $menuItemId)
                    ->update([
                        'quantity' => $quantity,
                        'notes' => $notes,
                        'updated_at' => now()
                    ]);
            } else {
                // Insert new
                \DB::table('carts')->insert([
                    'user_id' => Auth::id(),
                    'menu_item_id' => $menuItemId,
                    'quantity' => $quantity,
                    'price' => $menuItem->price,
                    'notes' => $notes,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            // Fast cart count
            $cartCount = \DB::table('carts')
                ->where('user_id', Auth::id())
                ->count();

            return response()->json([
                'success' => true,
                'message' => "{$menuItem->name} ditambahkan!",
                'cart_count' => $cartCount,
                'item_name' => $menuItem->name
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan coba lagi'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Anda harus login terlebih dahulu'], 401);
        }
        
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        $cartItem->update(['quantity' => $request->quantity]);

        return response()->json([
            'success' => true,
            'message' => 'Keranjang berhasil diperbarui!'
        ]);
    }

    public function remove($id)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Anda harus login terlebih dahulu'], 401);
        }
        
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        $cartItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item berhasil dihapus dari keranjang!'
        ]);
    }

    public function clear()
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Anda harus login terlebih dahulu'], 401);
        }
        
        Cart::where('user_id', Auth::id())->delete();

        return response()->json([
            'success' => true,
            'message' => 'Keranjang berhasil dikosongkan!'
        ]);
    }

    public function getCount()
    {
        if (!Auth::check()) {
            return response()->json(['count' => 0]);
        }
        
        $count = Cart::where('user_id', Auth::id())->count();
        
        return response()->json([
            'count' => $count
        ]);
    }
}
