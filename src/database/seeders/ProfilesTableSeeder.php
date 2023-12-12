<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'gender_id' => '1',
            'age_id' => '3',
            'nickname' => 'AAA',
            'my_image' => 'null'
        ];
        DB::table('profiles')->insert($param);
        $param = [
            'user_id' => '2',
            'gender_id' => '2',
            'age_id' => '2',
            'nickname' => 'BBB',
            'my_image' => 'null'
        ];
        DB::table('profiles')->insert($param);
        $param = [
            'user_id' => '3',
            'gender_id' => '3',
            'age_id' => '6',
            'nickname' => 'CCC',
            'my_image' => 'null'
        ];
        DB::table('profiles')->insert($param);
        $param = [
            'user_id' => '4',
            'gender_id' => '2',
            'age_id' => '1',
            'nickname' => 'DDD',
            'my_image' => 'null'
        ];
        DB::table('profiles')->insert($param);
    }
}
