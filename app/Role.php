<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 1;
    const TEACHER = 2;
    const STUDENT = 3;

    // 1 -> 1
    public function user()
    {
        return $this->hasOne(User::class);
    }


}
