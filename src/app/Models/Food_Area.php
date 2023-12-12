<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food_Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'area'
    ];

    // Eatingsテーブルとのリレーション
    public function eating()
    {
        return $this->hasOne(Eating::class, 'food_area_id', 'id');
    }

    protected $table = 'food_areas';
}
