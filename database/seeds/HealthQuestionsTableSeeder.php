<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HealthQuestionsTableSeeder extends Seeder
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

            INSERT INTO `health_questions` (`question`, `code_name`, `created_at`) VALUES
            ('Did you return the clinic card? ', 'return_card', $dateNow),
            ('How well has the health served you?', 'service',  $dateNow);
        ");
    }
}
