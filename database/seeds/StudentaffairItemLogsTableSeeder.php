<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentaffairItemLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = '\'' . now() . '\'';

        //student affairs
        /*
         *
         * */
        DB::statement("

            INSERT INTO `studentaffair_item_logs` (`user_id`, `description`, `item_id`, `created_at`) VALUES
            (8, 'Level 3 payment is yet to complete with left-over of #2000', 1, $dateNow),
            (9, 'Broken toilet mirror', 2, $dateNow),
            (10, 'Unpaid hostel fee', 1, $dateNow),
            (8, 'Guilt of removing the wardrobe draw in room 102', 2,  $dateNow);
        ");
    }
}
