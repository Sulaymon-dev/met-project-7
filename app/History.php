<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'audits';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array'
    ];
}
