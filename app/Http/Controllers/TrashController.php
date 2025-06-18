<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Note;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TrashController extends Controller
{
    public function index()
    {
        $trashes = Note::where('trash', 1)->get();
        return view('trashes.index')->with('trashes', $trashes);
    }

     public function trash($id)
    {
        $note = Note::findOrFail($id);
        $note->trash = !$note->trash; // toggle between true and false
        $note->save();

        $message = $note->trash ? 'Note trash successfully.' : 'Note untrashed successfully.';

    return back()->with('success', $message);
    }
}
