<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvisionalImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provisional_images')->insert([
            [
                'name'    => 'title',
                'path'    => 'itibariki',
            ]
        ]);
    }
}
