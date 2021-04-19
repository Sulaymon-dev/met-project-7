<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Profile extends Model
{
    protected $fillable = ['user_id', 'phone', 'avatar', 'experience', 'address', 'gender'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function uploadAvatar($image)
    {
        if ($image == null) {
            $this->avatar = 'no-avatar.jpg';
            $this->save();
            return;
        }

        $this->removeAvatar();

        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs('public/uploads/img', $filename);
        $this->avatar = $filename;
        $this->save();
    }

    public function removeAvatar()
    {
        if ($this->avatar !== 'no-avatar.jpg' && $this->avatar !== null) {
            Storage::delete('public/uploads/img' . $this->avatar);
        }
    }
}
