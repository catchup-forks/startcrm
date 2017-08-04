<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert(
            array( 
                'user_id' => 1, 
                'rank_id' => 4, 
                'fullname' => 'Vivian Low',
                'dob' => Carbon::create(1989, 12, 12, 0),
                'age' => 28,
                'gender_id' => 2,
                'email' => 'vivian198912@gmail.com',
                'mailaddr' => 'My Address long long long string',
                'contacthp' => '12345678',
                'contacthome' => '12345678',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        
        DB::table('profiles')->insert(
            array( 
                'user_id' => 2, 
                'rank_id' => 1,
                'gender_id' => 1,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
    }
}
