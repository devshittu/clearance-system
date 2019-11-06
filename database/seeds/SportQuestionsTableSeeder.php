<?php

use Illuminate\Database\Seeder;

class SportQuestionsTableSeeder extends Seeder
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

            INSERT INTO `sport_questions` (`question`, `code_name`, `created_at`) VALUES
            ('Did you meet your Dean for signature?', 'dean_signature', $dateNow),
            ('Did you meet your Level coordinator for signature?', 'lcoord_signature', $dateNow),
            ('How well has the faculty served you?', 'SCS',  $dateNow);
        ");
    }
}
