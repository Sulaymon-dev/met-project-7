<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'news';
    protected $fillable = ['user_id','title','description','body','img_src','status'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
