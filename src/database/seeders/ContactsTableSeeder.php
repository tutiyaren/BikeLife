<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
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
            'comment' => 'サンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプルサンプル'
        ];
        DB::table('contacts')->insert($param);
        $param = [
            'user_id' => '1',
            'comment' => 'テキストテキストテキストテキスト'
        ];
        DB::table('contacts')->insert($param);
        $param = [
            'user_id' => '2',
            'comment' => 'サンプルサンプルサンプルサンプルサンプルサンプルサンプル'
        ];
        DB::table('contacts')->insert($param);
    }
}
