@extends('layout')

@section('content')

<div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Note Details</h2>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-500">Title:</label>
        <p class="text-lg text-gray-800 font-medium">{{ $notes->title }}</p>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-500">Description:</label>
        <p class="text-gray-700">{{ $notes->description }}</p>
    </div>

     <div>
        <label class="block text-sm font-medium text-gray-500 mt-3">Reminder:</label>
        <p class="text-gray-700 ">{{ $notes->remindertime}}</p>
    </div>


    <div class="mt-6">
        <a href="{{ url('/notes') }}"
           class="inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
            Back to Notes
        </a>
    </div>
</div>

@endsection
