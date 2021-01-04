<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = ['plan_id', 'user_id', 'name', 'introduction', 'video_src', 'pdf_src', 'test', 'pdf_exercise', 'view_count'];
}
