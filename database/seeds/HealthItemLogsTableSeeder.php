<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HealthItemLogsTableSeeder extends Seeder
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
         * Keyboard Peripheral
         *
         * */
        DB::statement("

            INSERT INTO `health_item_logs` (`user_id`, `description`, `item_id`, `created_at`) VALUES
            (8, '2 H20 bag of drip ', 2, $dateNow),
            (9, 'Anti-biotics', 2, $dateNow),
            (10, 'Change of #1500 after malaria treatment', 3, $dateNow),
            (8, '#700 debit at the pharmacy.', 3,  $dateNow);
        ");
    }
}
