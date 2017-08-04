<?php

use Illuminate\Database\Seeder;

class AnnoucementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('annoucements')->insert(
            array( 
                'user_id' => 1, 
                'title' => 'Title 1',
                'content' => 'Annoucement 1. Of course, manually specifying the attributes for each model seed is cumbersome. Instead, you can use model factories to conveniently generate large amounts of database records. First, review the model factory documentation to learn how to define your factories. Once you have defined your factories, you may use the factory helper function to insert records into your database.', 
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        
        DB::table('annoucements')->insert(
            array( 
                'user_id' => 1,
                'title' => 'Title 2',
                'content' => 'Annoucement 2. Of course, manually specifying the attributes for each model seed is cumbersome. Instead, you can use model factories to conveniently generate large amounts of database records. First, review the model factory documentation to learn how to define your factories. Once you have defined your factories, you may use the factory helper function to insert records into your database.', 
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        
        DB::table('annoucements')->insert(
            array( 
                'user_id' => 1,
                'title' => 'Title 3',
                'content' => 'Annoucement 3. Of course, manually specifying the attributes for each model seed is cumbersome. Instead, you can use model factories to conveniently generate large amounts of database records. First, review the model factory documentation to learn how to define your factories. Once you have defined your factories, you may use the factory helper function to insert records into your database.', 
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
    }
}
