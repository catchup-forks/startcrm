<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GendersTableSeeder::class);
        $this->call(CourseTypesTableSeeder::class);
        $this->call(EventTypesTableSeeder::class);
        $this->call(FileCategoriesTableSeeder::class);
        
        $this->call(RanksTableSeeder::class);
        $this->call(CommitteesTableSeeder::class);
        $this->call(AwardsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        
        $this->call(ProfilesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(AnnoucementsTableSeeder::class);
        $this->call(FilesTableSeeder::class);
        
        $this->call(ProjectUserTableSeeder::class);
        $this->call(CommitteeUserTableSeeder::class);
    }
}
