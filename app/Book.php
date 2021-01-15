<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use Sluggable;

    protected $fillable = ['name', 'user_id', 'img_src', 'pdf_src', 'slug', 'status', 'is_show'];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }


    /**
     * @inheritDoc
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
