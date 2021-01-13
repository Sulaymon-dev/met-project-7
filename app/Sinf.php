<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Sinf extends Model
{

    use Sluggable;

    protected $fillable = ['class', 'slug','status'];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function olympics()
    {
        return $this->hasMany(Olympic::class);
    }

    /**
     * @inheritDoc
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'class'
            ]
        ];
    }
}
