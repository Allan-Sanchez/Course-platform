<?php

namespace App;

use App\Role;
use App\Student;
use App\Teacher;
use App\UserSocialAccount;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 1 -> 1
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // 1 -> 1 
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    // 1 -> 1
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    // 1 -> 1
    public function socialAccount()
    {
        return $this->hasOne(UserSocialAccount::class);
    }

}
