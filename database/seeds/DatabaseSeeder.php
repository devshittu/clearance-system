<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


        $this->call(AcademicSessionsTableSeeder::class);
        $this->call(FacultyQuestionsTableSeeder::class);
        $this->call(LibraryQuestionsTableSeeder::class);
        $this->call(SportQuestionsTableSeeder::class);
        $this->call(StudentaffairQuestionsTableSeeder::class);
        $this->call(SystemSettingsTableSeeder::class);

        factory('App\UserAdminProfile', 2)->create();
        factory('App\UserStaffProfile', 5)->create();
        factory('App\UserStudentProfile', 5)->create();

    }
}
