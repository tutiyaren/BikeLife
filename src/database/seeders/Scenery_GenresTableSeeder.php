<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Scenery_GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'genre' => 'バイク'
        ];
        DB::table('scenery_genres')->insert($param);
        $param = [
            'genre' => '人物'
        ];
        DB::table('scenery_genres')->insert($param);
        $param = [
            'genre' => '自然'
        ];
        DB::table('scenery_genres')->insert($param);
        $param = [
            'genre' => '人工物'
        ];
        DB::table('scenery_genres')->insert($param);
        $param = [
            'genre' => 'その他'
        ];
        DB::table('scenery_genres')->insert($param);
    }
}
