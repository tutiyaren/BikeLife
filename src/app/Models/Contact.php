<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'comment',
    ];

    // Usersテーブルとのリレーション
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_id', 'id');
    }

    protected $table = 'contacts';
}
