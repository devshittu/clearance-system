<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibraryItemLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = '\'' . now() . '\'';

        // Journals
        //books
        // Research Papers
        // Past Projects
        // Newspapers

        /*
            ('Head First Python', 'Paul Barry', $dateNow),
            ('Python Cookbook, Third edition,', 'David Beazley and Brian K. Jones', $dateNow),
            ('Learn Python The Hard Way', 'Zed A. Shaw', $dateNow),
            ('AI Superpowers', 'Kai-Fu Lee', $dateNow),
            ('Weapons of Math Destruction', 'Cathy O’Neil', $dateNow),
            ('A Byte Of Python', 'C.H. Swaroop', $dateNow),
            ('Natural Language Processing With Python', 'Steven Bird, Ewan Klein, and Edward Loper ',  $dateNow);
         *
         * */
        DB::statement("

            INSERT INTO `library_item_logs` (`user_id`, `description`, `item_id`, `created_at`) VALUES
            (8, 'Head First Python by Paul Barry', 2, $dateNow),
            (9, 'Python Cookbook, Third edition, by David Beazley and Brian K. Jones', 2, $dateNow),
            (10, 'AI Superpowers by Kai-Fu Le', 3, $dateNow),
            (8, 'Design and implementation of airport system by Afolabi Abiodun', 4,  $dateNow);
        ");
    }
}
