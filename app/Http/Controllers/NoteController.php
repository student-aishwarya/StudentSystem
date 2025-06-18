<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Note;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class  NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request): View
{
    $search = $request->input('search');

    $notes = Note::where(function ($query) {
            $query->whereNull('archive')->orWhere('archive', 0);
        })
        ->where(function ($query) {
            $query->whereNull('trash')->orWhere('trash', 0);
        })
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        })
        ->get();

    return view('notes.index', compact('notes'));
}




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Note::create($input);
        return redirect('notes')->with('flash_message', 'notes Addedd!');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id): View
    {
        $notes = Note::find($id);
        return view('notes.show')->with('notes', $notes);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $notes = Note::find($id);
        return view('notes.edit')->with('notes', $notes);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $notes = Note::find($id);
        $input = $request->all();
        $notes->update($input);
        return redirect('notes')->with('flash_message', 'notes Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Note::destroy($id);
        return redirect('notes')->with('flash_message', 'notes deleted!');
    }

    
   
}

