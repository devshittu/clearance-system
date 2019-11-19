<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibraryQuestionsTableSeeder extends Seeder
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
            INSERT INTO `library_questions` (`question`, `code_name`, `created_at`) VALUES
            ('Have you any pending book in your domitary?', 'pending_book', $dateNow),
            ('Do you use the library frequently?', 'use_frequency', $dateNow),
            ('How has the school library served you?', 'service',  $dateNow);
        ");
    }
}
