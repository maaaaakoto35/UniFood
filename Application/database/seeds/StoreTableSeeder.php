<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store')->insert([
            [
              'store_name' => 'はんなり食堂',
              'foods' => '37',
              'place' => '10号館',
            ],
            [
              'store_name' => '壱馬力',
              'foods' => '18',
              'place' => '並楽館1階',
            ],
            [
              'store_name' => 'BABY FACE PLANETS',
              'foods' => '18',
              'place' => '並楽館4階',
            ],
            [
              'store_name' => 'cosmic bakery cafe',
              'foods' => '44',
              'place' => '並楽館2階',
            ],
            [
              'store_name' => 'MIYAKO製麺',
              'foods' => '38',
              'place' => '並楽館2階',
            ],
            [
              'store_name' => 'ふじカツ',
              'foods' => '23',
              'place' => '並楽館1階',
            ],
            [
              'store_name' => 'むすびキッチン',
              'foods' => '13',
              'place' => '雄飛館2階',
            ],
            [
              'store_name' => 'LIBRE（リブレ）',
              'foods' => '54',
              'place' => '並楽館3階',
            ],
            [
              'store_name' => 'ラウンジふるさと',
              'foods' => '22',
              'place' => '神山ホール4階',
            ],
            [
              'store_name' => 'FamilyMart',
              'foods' => '200',
              'place' => '並楽館1階',
            ],
          ]);
    }
}
?>
