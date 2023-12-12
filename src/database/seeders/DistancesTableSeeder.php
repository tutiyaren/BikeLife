<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'distance' => '～150km',
        ];
        DB::table('distances')->insert($param);
        $param = [
            'distance' => '151km～',
        ];
        DB::table('distances')->insert($param);
        $param = [
            'distance' => '250km～',
        ];
        DB::table('distances')->insert($param);
        $param = [
            'distance' => '350km～',
        ];
        DB::table('distances')->insert($param);
        $param = [
            'distance' => '500km～',
        ];
        DB::table('distances')->insert($param);
    }
}
