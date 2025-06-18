<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\TrashController;


Route::get('/', function () {
    return view('layout');
});

Route::resource('notes',NoteController::class);
Route::resource('reminders',ReminderController::class);
Route::resource('archives',ArchiveController::class);
Route::get('/notes/{id}/archive', [ArchiveController::class, 'archive'])->name('notes.archive');
Route::resource('trashes',TrashController::class);
Route::get('/notes/{id}/trash', [TrashController::class, 'trash'])->name('notes.trash');






