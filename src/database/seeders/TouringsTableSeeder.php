<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TouringsTableSeeder extends Seeder
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
            'day_id' => '2',
            'distance_id' => '5',
            'date' => '2023-11-30',
            'destination' => '道の駅道志',
            'content' => '午前10時に道志で集合して、赴くままに周辺を走りたいです。',
            'created_at' => $now,
        ];
        DB::table('tourings')->insert($param);
        $param = [
            'profile_id' => '2',
            'day_id' => '1',
            'distance_id' => '3',
            'date' => '2023-12-18',
            'destination' => '香川県スタートで四国一周！！',
            'content' => '初対面の人と同じ時間を過ごしたいので行ってくれる人募集！',
            'created_at' => $now,
        ];
        DB::table('tourings')->insert($param);
        $param = [
            'profile_id' => '1',
            'day_id' => '4',
            'distance_id' => '1',
            'date' => '2024-01-13',
            'destination' => '九十九里で海見てから周辺でグルメツー',
            'content' => 'サンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキストサンプルテキスト',
            'created_at' => $now,
        ];
        DB::table('tourings')->insert($param);
    }
}
