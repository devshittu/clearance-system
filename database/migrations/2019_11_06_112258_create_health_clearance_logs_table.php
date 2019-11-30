<?php

use App\Utils\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthClearanceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_clearance_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger(Constants::DBC_USER_ID)->index();
            $table->boolean(Constants::DBC_IS_CLEARED)->index()->default(0);
            $table->unsignedInteger(Constants::DBC_QUESTION_ID)->index();
            $table->string(Constants::DBC_ANSWER)->nullable();


            $table->foreign(Constants::DBC_USER_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign(Constants::DBC_QUESTION_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('sport_questions')
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
        Schema::dropIfExists('health_clearance_logs');
    }
}
