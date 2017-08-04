<?php

use Illuminate\Database\Seeder;

class CommitteesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=10; $i++) {
            DB::table('committees')->insert(
                array( 
                    'name' => 'Committee '.$i, 
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
                ));
        }
    }
}
