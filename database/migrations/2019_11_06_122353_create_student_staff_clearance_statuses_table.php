<?php

use App\Utils\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentStaffClearanceStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_staff_clearance_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger(Constants::DBC_USER_ID)->index();
            $table->unsignedInteger(Constants::DBC_STAFF_ID)->index();
            $table->boolean(Constants::DBC_IS_CLEARED)->index()->default(0);

            $table->unsignedInteger(Constants::DBC_STAFF_ROLE_ID)->index();
            $table->foreign(Constants::DBC_STAFF_ROLE_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('roles')
                ->onUpdate('restrict')
                ->onDelete('restrict');


            $table->foreign(Constants::DBC_USER_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign(Constants::DBC_STAFF_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_staff_clearance_statuses');
    }
}
