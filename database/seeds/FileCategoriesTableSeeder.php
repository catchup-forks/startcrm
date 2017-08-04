<?php

use Illuminate\Database\Seeder;

class FileCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('file_categories')->insert(
            array( 
                'value' => 'Minutes', 
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        
        DB::table('file_categories')->insert(
            array( 
                'value' => 'Reports', 
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        
        DB::table('file_categories')->insert(
            array( 
                'value' => 'Finances', 
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
    }
}
