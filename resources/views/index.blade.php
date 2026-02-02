@extends('admin.layout')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">Menu Management</h1>
        <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-2"></i> Add New Item
        </a>
    </div>

    <!-- Filters -->
    <div class="flex gap-2 flex-wrap">
        <a href="{{ route('admin.menu.index') }}" 
           class="btn {{ request('category') == null ? 'btn-active' : 'btn-outline' }}">All</a>
        @foreach(['bakso', 'mie', 'paket', 'minuman'] as $cat)
        <a href="{{ route('admin.menu.index', ['category' => $cat]) }}" 
           class="btn {{ request('category') == $cat ? 'btn-active' : 'btn-outline' }}">
            {{ ucfirst($cat) }}
        </a>
        @endforeach
    </div>

    <!-- Menu Items Table -->
    <div class="card bg-white shadow">
        <div class="card-body">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menuItems as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="avatar">
                                    <div class="w-12 h-12 rounded">
                                        <img src="{{ $item->image_url ?: 'https://via.placeholder.com/150' }}" 
                                             alt="{{ $item->name }}">
                                    </div>
                                </div>
                            </td>
                            <td class="font-semibold">{{ $item->name }}</td>
                            <td>
                                <span class="badge badge-{{ 
                                    $item->category == 'bakso' ? 'primary' : 
                                    ($item->category == 'mie' ? 'secondary' : 
                                    ($item->category == 'paket' ? 'accent' : 'info'))
                                }}">
                                    {{ ucfirst($item->category) }}
                                </span>
                            </td>
                            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge badge-{{ $item->is_active ? 'success' : 'error' }}">
                                    {{ $item->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.menu.edit', $item) }}" 
                                       class="btn btn-sm btn-outline btn-info">Edit</a>
                                    <form action="{{ route('admin.menu.destroy', $item) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline btn-error"
                                                onclick="return confirm('Delete this item?')">Delete</button>
                                    </form>
                                    <form action="{{ route('admin.menu.toggle-status', $item) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline">
                                            {{ $item->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="mt-6">
                {{ $menuItems->links() }}
            </div>
        </div>
    </div>
</div>
@endsection