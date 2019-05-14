<?php

namespace App;

use App\User;
use App\Course;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['course_id','user_id','rating','comment'];
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
