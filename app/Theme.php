<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'plan_id',
        'user_id',
        'name',
        'introduction',
        'video_src',
        'pdf_src',
        'test',
        'pdf_exercise',
        'view_count',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
