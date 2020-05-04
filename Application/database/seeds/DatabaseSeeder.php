<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StoreTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(ProvisionalImagesTableSeeder::class);
        $this->call(MembeTablerSeeder::class);
    }
}
