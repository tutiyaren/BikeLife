<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_Touring_Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'touring_id',
    ];

    // Profilesテーブルとのリレーション
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }
    // Touringsテーブルとのリレーション
    public function touring()
    {
        return $this->belongsTo(Touring::class, 'touring_id', 'id');
    }

    protected $table = 'profile_touring_likes';
}
