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


        $this->call(RolesTableSeeder::class);
        $this->call(AcademicSessionsTableSeeder::class);
        $this->call(FacultyQuestionsTableSeeder::class);
        $this->call(LibraryQuestionsTableSeeder::class);
        $this->call(SportQuestionsTableSeeder::class);
        $this->call(HealthQuestionsTableSeeder::class);
        $this->call(StudentaffairQuestionsTableSeeder::class);
        $this->call(SystemSettingsTableSeeder::class);
        $this->call(FacultyItemsTableSeeder::class);
        $this->call(LibraryItemsTableSeeder::class);
        $this->call(SportItemsTableSeeder::class);
        $this->call(HealthItemsTableSeeder::class);
        $this->call(StudentaffairItemsTableSeeder::class);

        factory('App\UserAdminProfile', 2)->create();
        factory('App\UserStaffProfile', 5)->create();
        factory('App\UserStudentProfile', 5)->create();

        $this->call(RoleStaffTableSeeder::class);
        $this->call(FacultyItemLogsTableSeeder::class);
        $this->call(LibraryItemLogsTableSeeder::class);
        $this->call(SportItemLogsTableSeeder::class);
        $this->call(HealthItemLogsTableSeeder::class);
        $this->call(StudentaffairItemLogsTableSeeder::class);
    }
}
