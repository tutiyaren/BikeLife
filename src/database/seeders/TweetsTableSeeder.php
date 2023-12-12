<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TweetsTableSeeder extends Seeder
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
            'tweet' => 'サンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプル',
            'created_at' => $now,
        ];
        DB::table('tweets')->insert($param);
        $param = [
            'profile_id' => '2',
            'tweet' => 'テキストテキストテキストテキストテキストテキストテキスト',
            'created_at' => $now,
        ];
        DB::table('tweets')->insert($param);
        $param = [
            'profile_id' => '1',
            'tweet' => 'テキスト',
            'created_at' => $now,
        ];
        DB::table('tweets')->insert($param);
    }
}
