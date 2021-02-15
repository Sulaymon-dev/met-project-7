<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MMT extends Model
{
    protected $fillable = ['mmt_fan_id', 'cluster_id', 'component'];
    protected $table = 'mmts';

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function mmt_fan()
    {
        return $this->hasOne(MmtFan::class,'id');
    }

}
