<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Olympic extends Model
{
    protected $fillable = ['subject_id', 'sinf_id', 'user_id', 'type', 'test', 'pdf_src', 'img_src','title','introduction',
        'is_show','status'];

    public function sinf()
    {
        return $this->belongsTo(Sinf::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
