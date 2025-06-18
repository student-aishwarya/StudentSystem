@extends('layout')

@section('content')

<div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Note</h2>

    <form action="{{ url('notes/' . $notes->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PATCH')

        <input type="hidden" name="id" value="{{ $notes->id }}">

        <!-- Title Field -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
            <input type="text" name="title" id="title" value="{{ $notes->title }}" required
                   class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none" />
        </div>

        <!-- Description Field -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea name="description" id="description" rows="4" required
                      class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none">{{ $notes->description }}</textarea>
        </div>

        <!-- datetime field -->
         <div>
            <label for="remindertime" class="block text-sm font-medium text-gray-700 mb-1">Reminder Time</label>
            <input type="datetime-local" name="remindertime" id="remindertime"
                   class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none" />
        </div>


        <!-- Submit Button -->
        <div>
            <button type="submit"
                    class="px-5 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                Update
            </button>
        </div>
    </form>
</div>

@endsection
