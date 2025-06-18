@extends('layout')

@section('content')

<!-- Add New Note Button -->
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">Reminders</h2>
   
</div>

<!-- Notes Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
    @foreach($reminders as $item)
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

                <a href="{{ url('/notes/' . $item->id . '/edit') }}"
                   class="px-2 py-1 rounded hover:bg-yellow-100 hover:text-yellow-800 transition"
                   title="Edit">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>

                

                <a href="{{ url('/notes/' . $item->id . '/archive') }}"
                   class="px-2 py-1 rounded hover:bg-yellow-100 hover:text-yellow-800 transition"
                   title="Archive">
                    <i class="fa-solid fa-file-arrow-down"></i>
                </a>

                <a href="{{ url('/notes/' . $item->id . '/trash') }}"
                   class="px-2 py-1 rounded hover:bg-yellow-100 hover:text-yellow-800 transition"
                   title="Trash">
                    <i class="fa-solid fa-trash"></i>
                </a>

            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
