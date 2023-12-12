<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'age' => '10代'
        ];
        DB::table('ages')->insert($param);
        $param = [
            'age' => '20代'
        ];
        DB::table('ages')->insert($param);
        $param = [
            'age' => '30代'
        ];
        DB::table('ages')->insert($param);
        $param = [
            'age' => '40代'
        ];
        DB::table('ages')->insert($param);
        $param = [
            'age' => '50代'
        ];
        DB::table('ages')->insert($param);
        $param = [
            'age' => '60代'
        ];
        DB::table('ages')->insert($param);
        $param = [
            'age' => '70~'
        ];
        DB::table('ages')->insert($param);
    }
}
