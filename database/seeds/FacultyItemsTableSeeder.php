<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultyItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $dateNow = '\'' . now() . '\'';

        //networking tools and equiments
        /*
         * Networking Tools
         * Room Key
         * Gadgets
         * Peripherals
         * Books
         *
         * */
        DB::statement("

            INSERT INTO `faculty_items` (`label`, `created_at`) VALUES
            ('Networking Tools', $dateNow),
            ('Room Keys', $dateNow),
            ('Gadgets', $dateNow),
            ('Peripherals', $dateNow),
            ('Books',  $dateNow);
        ");
    }
}
