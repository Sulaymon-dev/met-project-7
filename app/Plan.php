<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['subject_id', 'sinf_id', 'book_id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
