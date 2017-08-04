<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            array( 
                'username' => 'S1234567H', 
                'password' => bcrypt('S1234567H'), 
                'is_admin' => true,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));

        DB::table('users')->insert(
            array( 
                'username' => 'S7654321H', 
                'password' => bcrypt('S7654321H'), 
                'is_admin' => false,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
    }
}
