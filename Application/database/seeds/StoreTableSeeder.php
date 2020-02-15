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
        $stores =  [
            ['はんなり食堂', 37, '10号館'],
        ];
        DB::insert($stores);
    }
}
