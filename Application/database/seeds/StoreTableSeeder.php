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
              'genre' => '和食',
              'foods' => '37',
              'price' => '~1000円',
              'open_time' => '平日10:00～16:00  水曜10:00～15:00',
              'place' => '10号館',
            ],
            [
              'store_name' =>'itibariki',
              'store_jname' => 'らーめん壱馬力',
              'genre' => 'ラーメン/中華そば',
              'foods' => '18',
              'price' => '~1000円',
              'open_time' => '平日11:00～19:00  土曜11:00～15:00',
              'place' => '並楽館1階',
            ],
            [
              'store_name' =>'babyface',
              'store_jname' => 'BABY FACE PLANETS',
              'genre' => '洋食',
              'foods' => '18',
              'price' => '~1000円',
              'open_time' => '平日11:00～15:00（L.O.14:30）',
              'place' => '並楽館4階',
            ],
            [
              'store_name' =>'cosmic',
              'store_jname' => 'cosmic bakery cafe',
              'genre' => 'パン',
              'foods' => '44',
              'price' => '~1000円',
              'open_time' => '平日10:00～17:00',
              'place' => '並楽館2階',
            ],
            [
              'store_name' =>'miyko',
              'store_jname' => 'MIYAKO製麺',
              'genre' => 'うどん/丼',
              'foods' => '38',
              'price' => '~1000円',
              'open_time' => '平日11:00～15:00',
              'place' => '並楽館2階',
            ],
            [
              'store_name' =>'fujikatu',
              'store_jname' => 'ふじカツ',
              'genre' => '揚げ物/カツ',
              'foods' => '23',
              'price' => '~1000円',
              'open_time' => '平日10:45～15:00',
              'place' => '並楽館1階',
            ],
            [
              'store_name' =>'musubi',
              'store_jname' => 'むすびキッチン',
              'genre' => '洋食',
              'foods' => '13',
              'price' => '~1000円',
              'open_time' => '平日11:00～14:00',
              'place' => '雄飛館2階',
            ],
            [
              'store_name' =>'libre',
              'store_jname' => 'LIBRE（リブレ）',
              'genre' => '王道ランチ',
              'foods' => '54',
              'price' => '~1000円',
              'open_time' => '平日8：30～10：00　10：00～15：00　17：00～20：00（L.O.19：30）土曜10:00～14:00',
              'place' => '並楽館3階',
            ],
            [
              'store_name' =>'furusato',
              'store_jname' => 'ラウンジふるさと',
              'genre' => '本格レストラン',
              'foods' => '22',
              'price' => '~1000円',
              'open_time' => '平日11:00～15:00  水・土曜11:00～14:00',
              'place' => '神山ホール4階',
            ],
            [
              'store_name' =>'familymart',
              'store_jname' => 'FamilyMart',
              'genre' => 'コンビニ',
              'foods' => '200',
              'price' => '~1000円',
              'open_time' => '平日8：00～19：00  水曜8：00～18：00  土曜8：00～17：00',
              'place' => '並楽館1階',
            ],
          ]);
    }
}
?>
