<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model
{
    // 1 -> 1
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
