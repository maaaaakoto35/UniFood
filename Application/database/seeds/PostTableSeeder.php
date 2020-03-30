<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title'         => 'title',
                'store_name'    => 'itibariki',
                'store_jname'   => 'はんなり食堂',
                'contents'      => '本文',
                'rate'          => 3,
            ]
        ]);
    }
}
