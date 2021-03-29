<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $fillable = ['index', 'name','status'];

    public function mmts()
    {
        return $this->hasMany(MMT::class);
    }

}
