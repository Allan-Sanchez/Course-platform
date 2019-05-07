<?php

namespace App;

use App\User;
use App\Course;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // 1 -> 1
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // 1 -> 1 
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
