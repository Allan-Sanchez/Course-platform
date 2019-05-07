<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    // N -> 1
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
