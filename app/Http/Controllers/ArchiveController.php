<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Note;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ArchiveController extends Controller
{
    public function index()
{
    $archives = Note::where('archive', 1)
        ->where(function ($query) {
            $query->whereNull('trash')
                  ->orWhere('trash', 0);
        })
        ->get();

    return view('archives.index')->with('archives', $archives);
}


     public function archive($id)
{
    $note = Note::findOrFail($id);
    $note->archive = !$note->archive; // toggle between true and false
    $note->save();

    $message = $note->archive ? 'Note archived successfully.' : 'Note unarchived successfully.';

    return back()->with('success', $message);
}

}
