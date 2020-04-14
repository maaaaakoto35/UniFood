<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'food_name'   => '鉄板ハンバーグランチ',
                'store_name'  => 'musubi',
                'store_jname' => 'むすびキッチン',
                'price'       => '550',
            ],
            [
                'food_name'   => '週替わり丼',
                'store_name'  => 'musubi',
                'store_jname' => 'むすびキッチン',
                'price'       => '450',
            ],
            [
                'food_name'   => '油そば',
                'store_name'  => 'itibariki',
                'store_jname' => '壱馬力',
                'price'       => '300',
            ],
            [
                'food_name'   => 'ジャンカツ',
                'store_name'  => 'fujikatu',
                'store_jname' => 'ふじカツ',
                'price'       => '490',
            ],
            [
                'food_name'   => 'マヨから丼',
                'store_name'  => 'miyako',
                'store_jname' => 'MIYAKO製麺',
                'price'       => '380',
            ],
            [
                'food_name'   => 'ふわふわ帽子のオムライス',
                'store_name'  => 'babyface',
                'store_jname' => 'BABY FACE PLANETS',
                'price'       => '400',
            ],
        ]);
    }
}
