<?php

use App\Utils\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultyItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->enum(Constants::DBC_SCHOOL_ITEM_CATEGORY, Constants::AV_SCHOOL_ITEM_CATEGORIES)
                ->default(Constants::DBCV_SCHOOL_ITEM_EQUIPMENT)
                ->nullable()
            ; //equipment laboratory
            $table->unsignedTinyInteger('quantity')->default(1);
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
        Schema::dropIfExists('faculty_items');
    }
}
