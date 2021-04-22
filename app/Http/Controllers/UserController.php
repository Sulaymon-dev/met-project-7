<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Profile;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $user = $request->user();
        $sinf = 1;
        $profile = Profile::where('user_id', $user->id)->first();
        $networks = '';
        $instagram = '';
        $facebook = '';
        $telegram = '';
        $linkedIn = '';
        $avatar = 'no-avatar.jpg';
        if ($profile) {
            $sinf = $profile->sinf;
            if ($profile->avatar) {
                $avatar = $profile->avatar;
            }
            $networks = json_decode($profile->networks);
            if ($networks) {
                foreach ($networks as $key => $network) {
                    switch ($key) {
                        case 'instagram':
                            $instagram = $network;
                            break;
                        case 'facebook':
                            $facebook = $network;
                            break;
                        case 'telegram':
                            $telegram = $network;
                            break;
                        case 'linkedin':
                            $linkedIn = $network;
                            break;
                    }
                }
            }
        }
        $theme = Plan::where('sinf_id', $sinf)->with('book', 'sinf', 'subject')->withCount('themes')->get();
        return view('front.pages.profile', compact(
            'profile',
            'user',
            'theme',
            'sinf',
            'networks',
            'instagram',
            'facebook',
            'telegram',
            'linkedIn',
            'avatar'));
    }

    public function update(Request $request)
    {
        $messages = [
            'required' => 'Майдони :attribute бояд хатми маълумот дошта бошад.',
            'string' => 'Майдони :attribute бояд маълумоти матни дошта бошад',
            'integer' => 'Майдони :attribute бояд маълумоти раками дошта бошад',
            'image' => ':attribute бояд формати расми дошта бошад',
        ];
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "phone" => "required",
            "sinf" => "nullable|integer",
            "gender" => "required",
            "instagram" => "nullable|string",
            "facebook" => "nullable|string",
            "telegram" => "nullable|string",
            "viber" => "nullable|string",
            "about" => "nullable|string",
            "avatar" => "image"
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $networks = $this->getNetworks($request->all());
        $userId = $request->user()->id;
        $user = User::find($userId);
        $profile = Profile::where('user_id', $userId)->first();
        $user->update([
            'name' => $request->get('name')
        ]);
        if ($profile) {
            $profile['user_id'] = $userId;
            $profile['phone'] = $request->get('phone');
            $profile['sinf'] = $request->get('sinf');
            $profile['about'] = $request->get('about');
            $profile['gender'] = $request->get('gender');
            $profile['networks'] = json_encode($networks);
            $profile->uploadAvatar($request->file('avatar'));
        } else {
            $profile = Profile::create([
                'user_id' => $userId,
                'phone' => $request->get('phone'),
                'gender' => $request->get('gender'),
                'sinf' => $request->get('sinf'),
                'about' => $request->get('about'),
                'networks' => json_encode($networks)
            ])->save();
            $profile->uploadAvatar($request->file('avatar'));
        }
        return redirect()->back()->with('success', 'Маълумот бо муваффакият сабт карда шуд!');
    }

    public function getNetworks($data)
    {
        $networks['instagram'] = $data['instagram'];
        $networks['facebook'] = $data['facebook'];
        $networks['telegram'] = $data['telegram'];
        $networks['linkedin'] = $data['linkedIn'];
        return $networks;
    }

}
