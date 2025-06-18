<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Note;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
{
    $reminders = Note::whereNotNull('remindertime')
        ->where(function ($query) {
            $query->whereNull('trash')
                  ->orWhere('trash', 0);
        })
        ->where(function ($query) {
            $query->whereNull('archive')
                  ->orWhere('archive', 0);
        })
        ->get();

    return view('reminders.index')->with('reminders', $reminders);
}


}