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
              'store_name' =>'hannnari',
              'store_jname' => 'はんなり食堂',
              'foods' => '37',
              'place' => '10号館',
            ],
            [
              'store_name' =>'itibariki',
              'store_jname' => '壱馬力',
              'foods' => '18',
              'place' => '並楽館1階',
            ],
            [
              'store_name' =>'babyface',
              'store_jname' => 'BABY FACE PLANETS',
              'foods' => '18',
              'place' => '並楽館4階',
            ],
            [
              'store_name' =>'cosmic',
              'store_jname' => 'cosmic bakery cafe',
              'foods' => '44',
              'place' => '並楽館2階',
            ],
            [
              'store_name' =>'miyko',
              'store_jname' => 'MIYAKO製麺',
              'foods' => '38',
              'place' => '並楽館2階',
            ],
            [
              'store_name' =>'fujikatu',
              'store_jname' => 'ふじカツ',
              'foods' => '23',
              'place' => '並楽館1階',
            ],
            [
              'store_name' =>'musubi',
              'store_jname' => 'むすびキッチン',
              'foods' => '13',
              'place' => '雄飛館2階',
            ],
            [
              'store_name' =>'libre',
              'store_jname' => 'LIBRE（リブレ）',
              'foods' => '54',
              'place' => '並楽館3階',
            ],
            [
              'store_name' =>'furusato',
              'store_jname' => 'ラウンジふるさと',
              'foods' => '22',
              'place' => '神山ホール4階',
            ],
            [
              'store_name' =>'familymart',
              'store_jname' => 'FamilyMart',
              'foods' => '200',
              'place' => '並楽館1階',
            ],
          ]);
    }
}
?>
