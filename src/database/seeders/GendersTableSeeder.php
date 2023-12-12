<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'gender' => 'male'
        ];
        DB::table('genders')->insert($param);
        $param = [
            'gender' => 'female'
        ];
        DB::table('genders')->insert($param);
        $param = [
            'gender' => 'other'
        ];
        DB::table('genders')->insert($param);
    }
}
