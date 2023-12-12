<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
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
            'touring_id' => '2',
            'content' => 'サンプルテキスト？',
            'created_at' => $now,
        ];
        DB::table('comments')->insert($param);
        $param = [
            'profile_id' => '2',
            'touring_id' => '2',
            'content' => 'サンプルテキスト??',
            'created_at' => $now,
        ];
        DB::table('comments')->insert($param);
        $param = [
            'profile_id' => '1',
            'touring_id' => '1',
            'content' => 'サンプルテキスト？??',
            'created_at' => $now,
        ];
        DB::table('comments')->insert($param);
    }
}
