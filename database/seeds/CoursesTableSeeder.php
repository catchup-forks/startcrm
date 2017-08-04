<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $k=1;   // course number
        for ($i=1; $i<=2; $i++) {   // 2 course types
            for ($j=1 ; $j<=4; $j++) {  // 4 ranks
                for ($l=1; $l<=5; $l++) {   // 5 courses/rank
                    DB::table('courses')->insert(
                        array(
                            'rank_id' => $j,
                            'name' => 'Course '.$k,
                            'filepath' => 'Course '.$k,
                            'course_type_id' => $i,
                            'created_at' => date('Y-m-d H:m:s'),
                            'updated_at' => date('Y-m-d H:m:s')
                        ));
                        $k++;
                }
            }
        }

    }
}
