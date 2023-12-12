<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SceneriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        $param = [
            'profile_id' => '1',
            'scenery_area_id' => '2',
            'scenery_genre_id' => '1',
            'title' => 'イケメンフェイス♡',
            'image' => 'face.jpg',
            'content' => 'サンプルテキスト',
            'created_at' => $now,
        ];
        DB::table('sceneries')->insert($param);
        $param = [
            'profile_id' => '1',
            'scenery_area_id' => '5',
            'scenery_genre_id' => '2',
            'title' => 'バイクと歩む人生',
            'image' => 'fuji.jpg',
            'content' => 'サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト',
            'created_at' => $now,
        ];
        DB::table('sceneries')->insert($param);
        $param = [
            'profile_id' => '2',
            'scenery_area_id' => '1',
            'scenery_genre_id' => '3',
            'title' => '上信越高原国立公園おすすめです',
            'image' => 'yama.jpg',
            'content' => 'サンプルテキストサンプルテキストサンプルテキストサンプルテキスト',
            'created_at' => $now,
        ];
        DB::table('sceneries')->insert($param);
        $param = [
            'profile_id' => '3',
            'scenery_area_id' => '6',
            'scenery_genre_id' => '4',
            'title' => '憩いの場所',
            'image' => 'tenntai.jpg',
            'content' => '',
            'created_at' => $now,
        ];
        DB::table('sceneries')->insert($param);
        $param = [
            'profile_id' => '4',
            'scenery_area_id' => '9',
            'scenery_genre_id' => '5',
            'title' => 'きれいな海でした。',
            'image' => 'umi.jpg',
            'content' => 'サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト',
            'created_at' => $now,
        ];
        DB::table('sceneries')->insert($param);
    }
}
