@extends('admin.layout')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">Menu Management</h1>
        <a href="{{ route('admin.menu.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">+ Add New Item</a>
    </div>

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <!-- Filters -->
    <div class="flex gap-2 flex-wrap">
        <a href="{{ route('admin.menu.index') }}" class="px-4 py-2 rounded-lg {{ !request('category') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">All</a>
        @foreach(['bakso', 'mie', 'paket', 'minuman'] as $cat)
        <a href="{{ route('admin.menu.index', ['category' => $cat]) }}" class="px-4 py-2 rounded-lg {{ request('category') == $cat ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">{{ ucfirst($cat) }}</a>
        @endforeach
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Category</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Price</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($menuItems as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $item->name }}</td>
                    <td class="px-6 py-4"><span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">{{ ucfirst($item->category) }}</span></td>
                    <td class="px-6 py-4">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 {{ $item->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} rounded-full text-sm">
                            {{ $item->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 space-x-2">
                        <a href="{{ route('admin.menu.edit', $item->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.menu.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this item?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No menu items found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center">
        {{ $menuItems->links() }}
    </div>
</div>
@endsection
