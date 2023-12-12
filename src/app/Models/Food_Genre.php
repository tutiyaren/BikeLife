<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food_Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre'
    ];

    // Eatingsテーブルとのリレーション
    public function eating()
    {
        return $this->hasOne(Eating::class, 'food_genre_id', 'id');
    }

    protected $table = 'food_genres';
}
