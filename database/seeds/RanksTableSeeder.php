<?php

use Illuminate\Database\Seeder;

class RanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ranks')->insert(
            array(
                'title' => 'Novice',
                'hours' => 0,
                'nextrank' => 'Apprentice',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));

        DB::table('ranks')->insert(
            array(
                'title' => 'Apprentice',
                'hours' => 200,
                'nextrank' => 'Practitioner',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));

        DB::table('ranks')->insert(
            array(
                'title' => 'Practitioner',
                'hours' => 500,
                'nextrank' => 'Expert',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));

        DB::table('ranks')->insert(
            array(
                'title' => 'Expert', 
                'hours' => 900,
                'nextrank' => 'Nil',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
    }
}
