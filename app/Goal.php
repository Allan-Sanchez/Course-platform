<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    // 1 -> 1
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
