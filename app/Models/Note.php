<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
     protected $table = 'notes';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description','archive','trash','remindertime','name'];
    use HasFactory;
}

