<?php

use Illuminate\Database\Seeder;

class StudentaffairItemsTableSeeder extends Seeder
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
         *
         * */
        DB::statement("

            INSERT INTO `studentaffair_items` (`label`, `created_at`) VALUES
            ('Outstanding', $dateNow),
            ('Damages',  $dateNow);
        ");
    }
}
