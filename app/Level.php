<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    // 1 -> 1 
    public function course()
    {
        return $this->hasOne(Course::class);
    }
}
