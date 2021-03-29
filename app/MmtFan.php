<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MmtFan extends Model
{
    protected  $guarded=['id'];

    public function mmt()
    {
        return $this->belongsTo(MMT::class);
    }
}
