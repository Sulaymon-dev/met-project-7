<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MmtFan extends Model
{

    protected $fillable = ['subject_id', 'test', 'pdf_src'];

    public function mmt()
    {
        return $this->belongsTo(MMT::class);
    }
}
