<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MMT extends Model
{
    protected $fillable = ['mmt_fan_id', 'cluster', 'component'];
}
