<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'day' => '日帰り'
        ];
        DB::table('days')->insert($param);
        $param = [
            'day' => '一泊'
        ];
        DB::table('days')->insert($param);
        $param = [
            'day' => '二泊'
        ];
        DB::table('days')->insert($param);
        $param = [
            'day' => '三泊～'
        ];
        DB::table('days')->insert($param);
    }
}
