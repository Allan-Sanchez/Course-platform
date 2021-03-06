<?php

namespace App;

use App\User;
use App\Course;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    // 1 -> N
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    // 1 -> 1 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
