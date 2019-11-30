<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HealthItemsTableSeeder extends Seeder
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
         * Bills
         * Crimping tools
         * Router
         * Mouse
         * Keyboard Peripheral
         *
         * */
        DB::statement("

            INSERT INTO `health_items` (`label`, `created_at`) VALUES
            ('Card', $dateNow),
            ('Drugs',  $dateNow),
            ('Outstanding fees',  $dateNow);
        ");
    }
}
