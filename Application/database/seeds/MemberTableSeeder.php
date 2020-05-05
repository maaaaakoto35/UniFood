<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            [
                'name'             => 'makoto',
                'e-mail'           => 'maaaaaakoto35@gmail.com',
                'student_number'   => 853842,
                'password'         => 'password',
            ]
        ]);
    }
}