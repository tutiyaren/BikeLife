<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_Tweet_Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'tweet_id',
    ];

    // Profilesテーブルとのリレーション
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }
    // Tweetsテーブルとのリレーション
    public function tweet()
    {
        return $this->belongsTo(Tweet::class, 'tweet_id', 'id');
    }

    protected $table = 'profile_tweet_favorites';
}
