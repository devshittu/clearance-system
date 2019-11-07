<?php

use App\Utils\Constants;
use Illuminate\Database\Seeder;

class RoleStaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $dateNow = '\''.now().'\'';

        $fields = array(Constants::DBC_USER_ID, Constants::DBC_ACAD_SESS_ID, Constants::DBC_STAFF_ROLE_ID, );


        DB::statement("

            INSERT INTO `role_staff` (`$fields[0]`, `$fields[1]`, `$fields[2]`, `created_at`) VALUES
            (3, 1, 1, $dateNow),
            (5, 2, 2, $dateNow),
            (6, 3, 3, $dateNow),
            (7, 3, 4, $dateNow),
            (4, 2, 5, $dateNow),
            (6, 3, 1, $dateNow),
            (3, 3, 2, $dateNow);
        ");
    }
}
