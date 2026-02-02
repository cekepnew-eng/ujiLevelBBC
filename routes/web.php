<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;

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

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/', function () {
        $stats = [
            'total_orders' => 0,
            'pending_orders' => 0,
            'total_menu' => \App\Models\MenuItem::count(),
            'pending_testimonials' => 0,
            'revenue' => 0,
            'branches' => \App\Models\Branch::count()
        ];
        return view('admin.dashboard', compact('stats'));
    })->name('admin.dashboard');

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
