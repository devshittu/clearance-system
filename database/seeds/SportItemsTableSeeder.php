<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $dateNow = '\'' . now() . '\'';

        //sporting items
        /*
         *  Jersey
         * Swimming trunks
         * Football
         * Handball
         * Nets
         * Footwear
         * Elbow pads
         * Sports gloves
         * Vehicles
         * */
        DB::statement("
            INSERT INTO `sport_items` (`label`, `created_at`) VALUES
            ('Jersey', $dateNow),
            ('Balls', $dateNow),
            ('Accessories', $dateNow),
            ('Vehicles',  $dateNow);
        ");
    }
}
