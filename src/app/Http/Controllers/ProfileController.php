<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gender;
use App\Models\Age;
use App\Models\Profile;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $profile = $user->profile;
        // プロフィールが存在しない場合はデフォルト値を設定
        if (!$profile) {
            $profile = new Profile();
            $profile->gender = new Gender(); 
            $profile->age = new Age(); 
        }
        
        return view('profile', compact('user', 'profile'));
    }
    public function store(ProfileRequest $request)
    {
        // フォームからの入力データを取得
        $nickname = $request->input('nickname');
        $gender = $request->input('gender');
        $ageString = $request->input('age');
        
        $age = Profile::convertAgeToId($ageString);

        $profile = auth()->user()->profile;

        // プロフィールが存在しない場合は新しいプロフィールを作成
        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = auth()->id();
        }

        $profile->nickname = $nickname;
        $profile->gender_id = $gender;
        $profile->age_id = $age;

        $profile->save();

        return redirect()->route('profile')->with('success', '新しいプロフィールを登録しました！');
    }
}
