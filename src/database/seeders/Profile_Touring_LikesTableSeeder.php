<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Profile_Touring_LikesTableSeeder extends Seeder
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
            'touring_id' => '1',
            'created_at' => $now,
        ];
        DB::table('profile_touring_likes')->insert($param);
        $param = [
            'profile_id' => '1',
            'touring_id' => '3',
            'created_at' => $now,
        ];
        DB::table('profile_touring_likes')->insert($param);
        $param = [
            'profile_id' => '2',
            'touring_id' => '2',
            'created_at' => $now,
        ];
        DB::table('profile_touring_likes')->insert($param);
    }
}
