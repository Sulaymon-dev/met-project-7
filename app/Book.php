<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'img', 'pdf_src', 'slug'];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
