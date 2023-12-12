<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EatingsTableSeeder extends Seeder
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
            'food_area_id'=> '2',
            'food_genre_id' => '10',
            'title' => 'おいしいカフェだったよ',
            'image' => 'eating.jpg',
            'content' => 'サンプルテキスト',
            'created_at' => $now,
        ];
        DB::table('eatings')->insert($param);
        $param = [
            'profile_id' => '1',
            'food_area_id' => '5',
            'food_genre_id' => '8',
            'title' => '人生一番のトースト',
            'image' => 'tannnenn.jpg',
            'content' => 'サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト',
            'created_at' => $now,
        ];
        DB::table('eatings')->insert($param);
        $param = [
            'profile_id' => '2',
            'food_area_id' => '1',
            'food_genre_id' => '1',
            'title' => '豪快な丼でおいしかったです',
            'image' => 'tai.jpg',
            'content' => 'サンプルテキストサンプルテキストサンプルテキストサンプルテキスト',
            'created_at' => $now,
        ];
        DB::table('eatings')->insert($param);
        $param = [
            'profile_id' => '3',
            'food_area_id' => '6',
            'food_genre_id' => '2',
            'title' => '埼玉の有名ラーメン店にて',
            'image' => 'yotuba.jpg',
            'content' => '',
            'created_at' => $now,
        ];
        DB::table('eatings')->insert($param);
    }
}
