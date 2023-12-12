<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepliesTableSeeder extends Seeder
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
            'comment_id' => '2',
            'content' => 'サンプルテキスト!!',
            'created_at' => $now,
        ];
        DB::table('replies')->insert($param);
        $param = [
            'profile_id' => '2',
            'comment_id' => '3',
            'content' => 'サンプルテキスト!!',
            'created_at' => $now,
        ];
        DB::table('replies')->insert($param);
    }
}
