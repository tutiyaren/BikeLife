<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Touring extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'day_id',
        'distance_id',
        'date',
        'destination',
        'content',
    ];

    // Daysテーブルとのリレーション
    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id', 'id');
    }
    // Distancesテーブルとのリレーション
    public function distance()
    {
        return $this->belongsTo(Distance::class, 'distance_id', 'id');
    }
    // Profilesテーブルとのリレーション
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }
    // profile_touring_likesテーブルとのリレーション
    public function profile_touring_likes()
    {
        return $this->hasMany(Profile_Touring_Like::class, 'touring_id', 'id');
    }
    // Commentテーブルとのリレーション
    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_id', 'id');
    }

    public static function convertDayToId($dayString)
    {
        switch ($dayString) {
            case '1':
                return 1;
            case '2':
                return 2;
            case '3':
                return 3;
            case '4':
                return 4;
            default:
                return 1;
        }
    }
    public static function convertDistanceToId($distanceString)
    {
        switch ($distanceString) {
            case '1':
                return 1;
            case '2':
                return 2;
            case '3':
                return 3;
            case '4':
                return 4;
            case '5':
                return 5;
            default:
                return 1;
        }
    }

    public function scopeNicknameSearch($query, $nickname)
    {
        if (!empty($nickname)) {
            $query->whereHas('profile', function ($q) use ($nickname) {
                $q->where('nickname', 'like', '%' . $nickname . '%');
            });
        }
    }
    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            $query->whereHas('profile.gender', function ($q) use ($gender) {
                $q->where('id', $gender);
            });
        }
    }
    public function scopeAgeSearch($query, $age)
    {
        if (!empty($age)) {
            $query->whereHas('profile.age', function ($q) use ($age) {
                $q->where('id', $age);
            });
        }
    }
    public function scopeDateSearch($query, $date)
    {
        if (!empty($date)) {
            $query->where('date', $date);
        }
    }
    public function scopeDaySearch($query, $day)
    {
        if (!empty($day)) {
            $query->where('day_id', $day);
        }
    }
    public function scopeDistanceSearch($query, $distance)
    {
        if (!empty($distance)) {
            $query->where('distance_id', $distance);
        }
    }
    public function scopeDestinationSearch($query, $destination)
    {
        if (!empty($destination)) {
            $query->where('destination', 'like', '%' . $destination . '%');
        }
    }

    protected $table = 'tourings';
}
