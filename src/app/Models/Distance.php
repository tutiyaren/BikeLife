<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    use HasFactory;

    protected $fillable = [
        'distance'
    ];

    // Touringsテーブルとのリレーション
    public function touring()
    {
        return $this->hasOne(Touring::class, 'distance_id', 'id');
    }


    protected $table = 'distances';
}
