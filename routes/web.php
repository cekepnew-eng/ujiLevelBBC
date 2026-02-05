<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [PagesController::class, 'menu'])->name('home');

// About
Route::get('/about', [HomeController::class, 'index'])->name('about');

// Simpan testimonial
Route::post('/testimonial', [HomeController::class, 'storeTestimonial'])
    ->name('testimonial.store');

// Pages
Route::get('/menu', [PagesController::class, 'menu'])->name('menu');
Route::get('/locations', [PagesController::class, 'locations'])->name('locations');
Route::get('/testimonials', [PagesController::class, 'testimonials'])->name('testimonials');

// Package pages
Route::get('/paket/{type}', [PagesController::class, 'packageDetail'])->name('package.detail');

// Contact Form
Route::post('/contact', [PagesController::class, 'submitContact'])->name('contact.submit');

// Menu Filter
Route::get('/filter-menu', [PagesController::class, 'filterMenu'])->name('menu.filter');

// User Authentication Routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [UserController::class, 'login'])->name('user.login.submit');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('user.register');
Route::post('/register', [UserController::class, 'register'])->name('user.register.submit');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

// Cart Routes (require authentication)
Route::middleware('auth')->group(function () {
    Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
    Route::post('/keranjang/add', [CartController::class, 'add'])->name('cart.add');
    Route::put('/keranjang/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/keranjang/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/keranjang/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/api/cart-count', [CartController::class, 'getCount']);
});

// Admin Authentication Routes
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Order Routes (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/order/{package}', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/payment/{order}', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('/payment/{order}', [PaymentController::class, 'process'])->name('payment.process');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Sales Reports
    Route::get('/sales', function () {
        return view('admin.sales.index');
    })->name('admin.sales.index');

    // Menu Management
    Route::get('/menu', function () {
        $menuItems = \App\Models\MenuItem::paginate(10);
        return view('admin.menu.index', compact('menuItems'));
    })->name('admin.menu.index');

    Route::get('/menu/create', function () {
        return view('admin.menu.create');
    })->name('admin.menu.create');

    Route::post('/menu', function (\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:bakso,mie,paket,minuman',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('menu-items', 'public');
            $validated['image_path'] = $path;
        }
        
        \App\Models\MenuItem::create($validated);
        return redirect()->route('admin.menu.index')->with('success', 'Menu item created successfully');
    })->name('admin.menu.store');

    Route::get('/menu/{id}/edit', function ($id) {
        $item = \App\Models\MenuItem::findOrFail($id);
        return view('admin.menu.edit', compact('item'));
    })->name('admin.menu.edit');

    Route::put('/menu/{id}', function (\Illuminate\Http\Request $request, $id) {
        $item = \App\Models\MenuItem::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:bakso,mie,paket,minuman',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($item->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($item->image_path)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($item->image_path);
            }
            $path = $request->file('image')->store('menu-items', 'public');
            $validated['image_path'] = $path;
        }
        
        $item->update($validated);
        return redirect()->route('admin.menu.index')->with('success', 'Menu item updated successfully');
    })->name('admin.menu.update');

    Route::delete('/menu/{id}', function ($id) {
        \App\Models\MenuItem::findOrFail($id)->delete();
        return redirect()->route('admin.menu.index')->with('success', 'Menu item deleted successfully');
    })->name('admin.menu.destroy');

    // Testimonials
    Route::get('/testimonials', function () {
        $testimonials = \App\Models\Testimonial::paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    })->name('admin.testimonials.index');

    Route::post('/testimonials/{id}/approve', function ($id) {
        \App\Models\Testimonial::findOrFail($id)->update(['is_approved' => true]);
        return redirect()->back()->with('success', 'Testimonial approved');
    })->name('admin.testimonials.approve');

    Route::delete('/testimonials/{id}', function ($id) {
        \App\Models\Testimonial::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Testimonial deleted');
    })->name('admin.testimonials.destroy');

    // Orders
    Route::get('/orders', function () {
        return view('admin.orders.index');
    })->name('admin.orders.index');

    // Branches
    Route::get('/branches', function () {
        $branches = \App\Models\Branch::all();
        return view('admin.branches.index', compact('branches'));
    })->name('admin.branches.index');

    Route::get('/branches/create', function () {
        return view('admin.branches.create');
    })->name('admin.branches.create');

    Route::post('/branches', function (\Illuminate\Http\Request $request) {
        \App\Models\Branch::create($request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'nullable|string',
            'google_maps_url' => 'nullable|url',
            'operational_hours' => 'nullable|string',
            'is_main' => 'boolean'
        ]));
        return redirect()->route('admin.branches.index')->with('success', 'Branch created successfully');
    })->name('admin.branches.store');

    Route::get('/branches/{id}/edit', function ($id) {
        $branch = \App\Models\Branch::findOrFail($id);
        return view('admin.branches.edit', compact('branch'));
    })->name('admin.branches.edit');

    Route::put('/branches/{id}', function (\Illuminate\Http\Request $request, $id) {
        $branch = \App\Models\Branch::findOrFail($id);
        $branch->update($request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'nullable|string',
            'google_maps_url' => 'nullable|url',
            'operational_hours' => 'nullable|string',
            'is_main' => 'boolean'
        ]));
        return redirect()->route('admin.branches.index')->with('success', 'Branch updated successfully');
    })->name('admin.branches.update');

    Route::delete('/branches/{id}', function ($id) {
        \App\Models\Branch::findOrFail($id)->delete();
        return redirect()->route('admin.branches.index')->with('success', 'Branch deleted successfully');
    })->name('admin.branches.destroy');
});

/*
|--------------------------------------------------------------------------
| Fallback
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return redirect()->route('home');
});
