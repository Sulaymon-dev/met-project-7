<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sinf extends Model
{
    protected $fillable = ['class', 'slug'];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function olympics()
    {
        return $this->hasMany(Olympic::class);
    }
}
