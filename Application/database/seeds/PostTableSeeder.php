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
                'name'          => 'maaaaakoto',
                'title'         => 'title',
                'store_name'    => 'itibariki',
                'store_jname'   => '壱馬力',
                'contents'      => '本文',
                'rate'          => 3,
            ]
        ]);
    }
}
