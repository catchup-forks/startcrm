<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::create(2017, 5, 1, 12);
        for ($i=1; $i<=5; $i++) {
            $enddt = $dt->copy()->addHours(1);
            DB::table('events')->insert(
                array( 
                    'user_id' => 1,
                    'startdt' => $dt,
                    'enddt' => $enddt,
                    'duration' => $dt->diffInMinutes($enddt),
                    'event_type_id' => 1,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
                ));
            $dt->addDay(3);
        }
        
        $dt = Carbon::create(2017, 6, 1, 12);
        for ($i=1; $i<=5; $i++) {
            $enddt = $dt->copy()->addMinutes(30);
            DB::table('events')->insert(
                array( 
                    'user_id' => 1,
                    'startdt' => $dt,
                    'enddt' => $enddt,
                    'duration' => $dt->diffInMinutes($enddt),
                    'event_type_id' => 2,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
                ));
            $dt->addDay(3);
        }
        
        $dt = Carbon::create(2017, 7, 1, 12);
        for ($i=1; $i<=3; $i++) {
            $enddt = $dt->copy()->addHours(2);
            DB::table('events')->insert(
                array( 
                    'user_id' => 1,
                    'startdt' => $dt,
                    'enddt' => $enddt,
                    'duration' => $dt->diffInMinutes($enddt),
                    'event_type_id' => 3,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
                ));
            $dt->addDay(3);
        }
        
        $dt = Carbon::create(2017, 6, 1, 12);
        for ($i=1; $i<=5; $i++) {
            $enddt = $dt->copy()->addMinutes(30);
            DB::table('events')->insert(
                array( 
                    'user_id' => 2,
                    'startdt' => $dt,
                    'enddt' => $enddt,
                    'duration' => $dt->diffInMinutes($enddt),
                    'event_type_id' => 2,
                    'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
                ));
            $dt->addDay(3);
        }
    }
}
