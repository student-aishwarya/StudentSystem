<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
     protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'syllabus', 'duration'];


public function duration()
{
    return $this ->duration."Months";
}
}
