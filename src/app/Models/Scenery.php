<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scenery extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'scenery_area_id',
        'scenery_genre_id',
        'title',
        'image',
        'image1',
        'image2',
        'image3',
        'content',
    ];

    // Scenery_Areasテーブルとのリレーション
    public function scenery_area()
    {
        return $this->belongsTo(Scenery_Area::class, 'scenery_area_id', 'id');
    }
    // Scenery_Genresテーブルとのリレーション
    public function scenery_genre()
    {
        return $this->belongsTo(Scenery_Genre::class, 'scenery_genre_id', 'id');
    }
    // Profilesテーブルとのリレーション
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }


    public function scopeAreaSearch($query, $area)
    {
        if (!empty($area) && $area !== '全てのエリア') {
            $query->whereHas('scenery_area', function ($q) use ($area) {
                $q->where('area', $area);
            });
        }
    }
    public function scopeGenreSearch($query, $genre)
    {
        if (!empty($genre) && $genre !== '全てのエリア') {
            $query->whereHas('scenery_genre', function ($q) use ($genre) {
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
            case 'バイク':
                return 1;
            case '人物':
                return 2;
            case '自然':
                return 3;
            case '人工物':
                return 4;
            case 'その他':
                return 5;
            default:
                return 5;
        }
    }



    protected $table = 'sceneries';
}
