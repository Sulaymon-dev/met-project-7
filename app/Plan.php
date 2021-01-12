<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['subject_id', 'sinf_id', 'book_id'];

    public function sinf()
    {
        return $this->belongsTo(Sinf::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function theme()
    {
        return $this->hasMany(Theme::class);
    }
}
