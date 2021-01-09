<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use Sluggable;

    protected $fillable = ['name', 'slug', 'is_mmt', 'status', 'image_src'];

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


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
