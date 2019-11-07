<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = '\'' . now() . '\'';

        DB::statement("

            INSERT INTO `roles` (`title`, `code_name`, `created_at`) VALUES
            ('Faculty', 'faculty', $dateNow),
            ('Library', 'library', $dateNow),
            ('Sport', 'sport', $dateNow),
            ('Student Affairs', 'student_affairs',  $dateNow);
        ");
//        ('Health', 'health', $dateNow),

    }
}
