<?php

use App\Utils\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_staff', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger(Constants::DBC_USER_ID)->index();
            $table->unsignedInteger(Constants::DBC_ACAD_SESS_ID)->index()->nullable();
//            $table->enum(Constants::DBC_STAFF_CLEARANCE_ROLE, Constants::AV_STAFF_ROLES)->default(Constants::DBCV_STAFF_ROLE_FACULTY);

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

            $table->foreign(Constants::DBC_ACAD_SESS_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('academic_sessions')
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
        Schema::dropIfExists('role_staff');
    }
}
