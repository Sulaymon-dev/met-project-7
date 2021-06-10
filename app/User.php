<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable// implements Auditable
{
    use HasApiTokens, Notifiable;//, \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'status'
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


    public function themes()
    {
        return $this->hasMany(Theme::class);
    }

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
