<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scenery_Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre'
    ];

    // Scenerysテーブルとのリレーション
    public function scenery()
    {
        return $this->hasOne(Scenery::class, 'scenery_genre_id', 'id');
    }

    protected $table = 'scenery_genres';
}
