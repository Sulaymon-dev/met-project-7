<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'slug', 'is_mmt'];

    public function mmts()
    {
        return $this->hasMany(MMT::class);
    }

    public function olympics()
    {
        return $this->hasMany(Olympic::class);
    }

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
