@extends('admin.layout')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">Testimonials</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900">← Back</a>
    </div>

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Customer</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Message</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Rating</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $testimonial)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-semibold">{{ $testimonial->customer_name }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ Str::limit($testimonial->content, 50) }}</td>
                    <td class="px-6 py-4">
                        <span class="text-yellow-500">
                            @for($i = 0; $i < 5; $i++)
                                @if($i < $testimonial->rating) ★ @else ☆ @endif
                            @endfor
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 {{ $testimonial->is_approved ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }} rounded-full text-sm">
                            {{ $testimonial->is_approved ? 'Approved' : 'Pending' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 space-x-2">
                        @if(!$testimonial->is_approved)
                        <form action="{{ route('admin.testimonials.approve', $testimonial->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-green-600 hover:underline">Approve</button>
                        </form>
                        @endif
                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this testimonial?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No testimonials found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="flex justify-center">
        {{ $testimonials->links() }}
    </div>
</div>
@endsection
