<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['subject_id', 'sinf_id', 'book_id','status','is_show','user_id'];

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function themes()
    {
        return $this->hasMany(Theme::class);
    }
}
