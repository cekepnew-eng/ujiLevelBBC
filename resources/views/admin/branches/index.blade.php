@extends('admin.layout')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">Branches</h1>
        <a href="{{ route('admin.branches.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">+ Add New Branch</a>
    </div>

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($branches as $branch)
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-xl font-bold">{{ $branch->name }}</h3>
                    @if($branch->is_main)
                    <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">Main Branch</span>
                    @endif
                </div>
            </div>
            <div class="space-y-2 text-sm text-gray-700 mb-4">
                <p><strong>📍</strong> {{ $branch->address }}</p>
                @if($branch->phone)
                <p><strong>📞</strong> {{ $branch->phone }}</p>
                @endif
                @if($branch->operational_hours)
                <p><strong>⏰</strong> {{ $branch->operational_hours }}</p>
                @endif
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.branches.edit', $branch->id) }}" class="text-blue-600 hover:underline">Edit</a>
                <form action="{{ route('admin.branches.destroy', $branch->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this branch?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                </form>
            </div>
        </div>
        @empty
        <p class="text-gray-500">No branches found</p>
        @endforelse
    </div>
</div>
@endsection
