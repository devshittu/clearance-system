<?php

use App\Utils\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibraryItemLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_item_logs', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger(Constants::DBC_USER_ID)->index();
            $table->boolean(Constants::DBC_IS_FIXED)->index()->default(0);
            $table->string(Constants::DBC_DESCRIPTION)->nullable();
            $table->unsignedInteger(Constants::DBC_ITEM_ID)->index();


            $table->foreign(Constants::DBC_USER_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign(Constants::DBC_ITEM_ID)
                ->references(Constants::DBC_REF_ID)
                ->on('library_items')
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
        Schema::dropIfExists('library_item_logs');
    }
}
