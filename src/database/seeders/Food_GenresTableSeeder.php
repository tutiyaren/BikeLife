<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Food_GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'genre' => '米類'
        ];
        DB::table('food_genres')->insert($param);
        $param = [
            'genre' => '麺類'
        ];
        DB::table('food_genres')->insert($param);
        $param = [
            'genre' => 'パン類'
        ];
        DB::table('food_genres')->insert($param);
        $param = [
            'genre' => '肉'
        ];
        DB::table('food_genres')->insert($param);
        $param = [
            'genre' => '魚'
        ];
        DB::table('food_genres')->insert($param);
        $param = [
            'genre' => '野菜'
        ];
        DB::table('food_genres')->insert($param);
        $param = [
            'genre' => 'デザート'
        ];
        DB::table('food_genres')->insert($param);
        $param = [
            'genre' => 'スープ'
        ];
        DB::table('food_genres')->insert($param);
        $param = [
            'genre' => '飲み物'
        ];
        DB::table('food_genres')->insert($param);
        $param = [
            'genre' => 'その他'
        ];
        DB::table('food_genres')->insert($param);
    }
}
