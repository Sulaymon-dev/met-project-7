<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['phone', 'avatar', 'experience', 'address', 'gender'];
}
