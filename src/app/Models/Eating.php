<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Eating extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'food_area_id',
        'food_genre_id',
        'title',
        'image',
        'image1',
        'image2',
        'image3',
        'content',
    ];

    // Food_Areasテーブルとのリレーション
    public function food_area()
    {
        return $this->belongsTo(Food_Area::class, 'food_area_id', 'id');
    }
    // Food_Genresテーブルとのリレーション
    public function food_genre()
    {
        return $this->belongsTo(Food_Genre::class, 'food_genre_id', 'id');
    }
    // Profilesテーブルとのリレーション
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }


    public function scopeAreaSearch($query, $area)
    {
        if (!empty($area) && $area !== '全てのエリア') {
            $query->whereHas('food_area', function ($q) use ($area) {
                $q->where('area', $area);
            });
        }
    }
    public function scopeGenreSearch($query, $genre)
    {
        if (!empty($genre) && $genre !== '全てのエリア') {
            $query->whereHas('food_genre', function ($q) use ($genre) {
                $q->where('genre', $genre);
            });
        }
    }
    public function scopeTitleSearch($query, $title)
    {
        if (!empty($title)) {
            $query->where('title', 'like', '%' . $title . '%');
        }
    }

    public static function convertAreaToId($areaString)
    {
        switch ($areaString) {
            case '北海道':
                return 1;
            case '東北':
                return 2;
            case '関東':
                return 3;
            case '中部':
                return 4;
            case '近畿':
                return 5;
            case '中国':
                return 6;
            case '四国':
                return 7;
            case '九州':
                return 8;
            case '沖縄':
                return 9;
            case '海外':
                return 10;
            case 'その他':
                return 11;
            default:
                return 11;
        }
    }

    public static function convertGenreToId($genreString)
    {
        switch ($genreString) {
            case '米類':
                return 1;
            case '麺類':
                return 2;
            case 'パン類':
                return 3;
            case '肉':
                return 4;
            case '魚':
                return 5;
            case '野菜':
                return 6;
            case 'デザート':
                return 7;
            case 'スープ':
                return 8;
            case '飲み物':
                return 9;
            case 'その他':
                return 10;
            default:
                return 11;
        }
    }



    protected $table = 'eatings';
}
