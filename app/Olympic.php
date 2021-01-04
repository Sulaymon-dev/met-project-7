<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Olympic extends Model
{
    protected $fillable = ['subject_id', 'sinf_id', 'type', 'test', 'pdf_src'];
}
