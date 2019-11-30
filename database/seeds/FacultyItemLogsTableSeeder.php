<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultyItemLogsTableSeeder extends Seeder
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
         * Cat-5e
         * Crimping tools
         * Router
         * Mouse
         * Keyboard Peripheral
         *
         * */
        DB::statement("

            INSERT INTO `faculty_item_logs` (`user_id`, `description`, `item_id`, `created_at`) VALUES
            (8, 'Cat-5e', 1, $dateNow),
            (9, 'Cat-5e', 1, $dateNow),
            (10, 'Head First', 5, $dateNow),
            (10, 'Keyboard', 4, $dateNow),
            (8, 'Crimping tools during lecture II', 1,  $dateNow);
        ");
    }
}
