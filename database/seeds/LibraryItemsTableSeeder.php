<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibraryItemsTableSeeder extends Seeder
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
         * Head First Python by Paul Barry
         * Python Cookbook, Third edition, by David Beazley and Brian K. Jones
         *  Learn Python The Hard Way, by Zed A. Shaw
         * AI Superpowers by Kai-Fu Lee
         * Weapons of Math Destruction by Cathy O’Neil
         * A Byte Of Python, by C.H. Swaroop
         *
         * Natural Language Processing With Python, by Steven Bird, Ewan Klein, and Edward Loper
         * */
        DB::statement("
            INSERT INTO `library_items` (`label`, `created_at`) VALUES
            ('Journals', $dateNow),
            ('Books', $dateNow),
            ('Research Papers', $dateNow),
            ('Past Projects', $dateNow),
            ('Newspapers', $dateNow);
        ");
    }
}
