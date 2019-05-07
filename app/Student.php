<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // N -> N
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    
    // 1-> 1 
    public function user()
    {
        return $this->belongsTo(User::class)->select('id','role_id','name','email');
    }
}
