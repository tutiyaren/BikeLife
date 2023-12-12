<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gender_id',
        'age_id',
        'nickname',
        'my_image',
    ];

    // Usersテーブルとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // Gendersテーブルとのリレーション
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'id');
    }
    // Agesテーブルとのリレーション
    public function age()
    {
        return $this->belongsTo(Age::class, 'age_id', 'id');
    }
    // Tweetsテーブルとのリレーション
    public function tweets()
    {
        return $this->hasMany(Tweet::class, 'profile_id', 'id');
    }
    // profile_tweet_favoritesテーブルとのリレーション
    public function profile_tweet_favorites()
    {
        return $this->hasMany(Profile_Tweet_Favorite::class, 'profile_id', 'id');
    }
    // Touringsテーブルとのリレーション
    public function tourings()
    {
        return $this->hasMany(Touring::class, 'touring_id', 'id');
    }
    // Commentsテーブルとのリレーション
    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_id', 'id');
    }
    // Repliesテーブルとのリレーション
    public function replies()
    {
        return $this->hasMany(Replie::class, 'replie_id', 'id');
    }
    // Eatingsテーブルとのリレーション
    public function eatings()
    {
        return $this->hasMany(Eating::class, 'eating_id', 'id');
    }
    // Sceneriessテーブルとのリレーション
    public function Sceneries()
    {
        return $this->hasMany(Scenery::class, 'scenery_id', 'id');
    }

    protected $table = 'profiles';

    public static function convertAgeToId($ageString)
    {
        switch ($ageString) {
            case '10代':
                return 1;
            case '20代':
                return 2;
            case '30代':
                return 3;
            case '40代':
                return 4;
            case '50代':
                return 5;
            case '60代':
                return 6;
            case '70~':
                return 7;
            default:
                return 1;
        }
    }


}
