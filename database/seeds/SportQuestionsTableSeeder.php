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
            ('What sporting activities did you take part in while in school?', 'your_activities', $dateNow),
            ('Do you have any pending contract with the school Gym?', 'gym_contract', $dateNow),
            ('How has the sport department served you during your stay on campus?', 'service',  $dateNow);
        ");
    }
}
