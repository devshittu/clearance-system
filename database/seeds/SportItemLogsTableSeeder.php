<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportItemLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = '\'' . now() . '\'';

        /*
            ('Jersey', $dateNow),
            ('Balls', $dateNow),
            ('Accessories', $dateNow),
            ('Vehicles',  $dateNow);
        */
        //networking tools and equiments
        /*
            ('Jersey', $dateNow),
            ('Swimming trunks', $dateNow),
            ('Football', $dateNow),
            ('Handball', $dateNow),
            ('Nets', $dateNow),
            ('Footwear', $dateNow),
            ('Elbow pads', $dateNow),
            ('Sports gloves', $dateNow),
            ('Vehicles',  $dateNow);
         *
         * */
        DB::statement("

            INSERT INTO `sport_item_logs` (`user_id`, `description`, `item_id`, `created_at`) VALUES
            (8, 'Swimming trunks', 1, $dateNow),
            (9, 'Football', 2, $dateNow),
            (10, 'Nets', 3, $dateNow),
            (8, 'Sports gloves', 2,  $dateNow);
        ");
    }
}
