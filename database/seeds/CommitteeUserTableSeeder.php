<?php

use Illuminate\Database\Seeder;

class CommitteeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=5; $i++) {
            DB::table('committee_user')->insert(
                array( 
                    'committee_id' => $i,
                    'user_id' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
                ));
        }
        
        for ($i=6; $i<=10; $i++) {
            DB::table('committee_user')->insert(
                array( 
                    'committee_id' => $i,
                    'user_id' => 1,
                    'is_active' => false,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
                ));
        }
    }
}
