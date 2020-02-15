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
          ]);
    }
}
?>
