<?php

use Illuminate\Database\Seeder;

class StudentaffairQuestionsTableSeeder extends Seeder
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

            INSERT INTO `studentaffair_questions` (`question`, `code_name`, `created_at`) VALUES
            ('Have you physically return your school id card?', 'id_return_status', $dateNow),
            ('Did you spend your last for years in the hostel?', 'hostel_use', $dateNow),
            ('How has the school served you during time spent?', 'service',  $dateNow);
        ");
    }
}
