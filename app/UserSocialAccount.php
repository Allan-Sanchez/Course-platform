<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model
{
    protected $fillable = ['user_id','provider','provider_uid'];

    public $timestamps = false;
    // 1 -> 1
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
