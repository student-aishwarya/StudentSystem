@extends('layout')

@section('content')

<!-- Add New Note Button -->
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">Recently deleted</h2>
</div>

<!-- Notes Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
    @foreach($trashes as $item)
    <div class="bg-white p-4 rounded-lg shadow hover:shadow-md transition relative">
        <div class="flex justify-between items-start">
            <h3 class="text-lg font-semibold text-gray-800">{{ $item->title }}</h3>
        </div>
        <p class="text-gray-600 mt-2">{{ $item->description }}</p>
        <p class="text-gray-600 mt-2">{{ $item->remindertime }}</p>

        <!-- Action Buttons -->
        <div class="mt-4 flex justify-between items-center text-sm text-gray-500">
            <div class="flex space-x-2">
                <a href="{{ url('/notes/' . $item->id) }}"
                    class="px-2 py-1 rounded hover:bg-blue-100 hover:text-blue-700 transition"
                    title="View">
                    <i class="fa-solid fa-eye"></i>
                </a>

                <a href="{{ url('/notes/' . $item->id . '/archive') }}"
                    class="px-2 py-1 rounded hover:bg-yellow-100 hover:text-yellow-800 transition"
                    title="Archive">
                    <i class="fa-solid fa-file-arrow-down"></i>
                </a>

                <a href="{{ url('/notes/' . $item->id . '/trash') }}"
                   class="px-2 py-1 rounded hover:bg-yellow-100 hover:text-yellow-800 transition"
                   title="Restore">
                <i class="fa-solid fa-trash-can-arrow-up"></i>
                </a>

                <form method="POST" action="{{ url('/notes/' . $item->id) }}" class="inline-block"
                    onsubmit="return confirm('Confirm delete?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-2 py-1 rounded hover:bg-red-100 hover:text-red-600 transition"
                        title="Delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>

            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection