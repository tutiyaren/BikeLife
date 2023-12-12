<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'tweet',
    ];

    // Profilesテーブルとのリレーション
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }
    // profile_tweet_favoritesテーブルとのリレーション
    public function profile_tweet_favorites()
    {
        return $this->hasMany(Profile_Tweet_Favorite::class, 'tweet_id', 'id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'profile_id', 'id');
    }

    // 検索
    public function scopeSearch($query, $keyword)
    {
        return $query->where('tweet', 'like', '%' . $keyword . '%');
    }

    // お気に入りの総数を取得する
    public function getFavoriteCountAttribute()
    {
        return $this->profile_tweet_favorites->count();
    }

    protected $table = 'tweets';
}
