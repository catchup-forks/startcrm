<?php

use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($k=1; $k<=3; $k++) {
            for ($i=1; $i<=10; $i++) {
                for ($j=1; $j<=10; $j++) {
                    DB::table('files')->insert(
                        array( 
                            'project_id' => $i, 
                            'name' => 'File '.$j,
                            'filepath' => 'File '.$j,
                            'file_category_id' => $k,
                            'created_at' => date('Y-m-d H:m:s'),
                            'updated_at' => date('Y-m-d H:m:s')
                        ));
                }

            }
        }


    }
}
