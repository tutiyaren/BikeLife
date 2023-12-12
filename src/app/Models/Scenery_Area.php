<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scenery_Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'area'
    ];

    // Scenerysテーブルとのリレーション
    public function scenery()
    {
        return $this->hasOne(Scenery::class, 'scenery_area_id', 'id');
    }

    protected $table = 'scenery_areas';
}
