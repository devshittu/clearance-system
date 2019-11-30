<?php

use App\Utils\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibraryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
//            $table->string('isbn', 30)->nullable()->default('12345678');
//            $table->string('publisher', 30)->nullable()->default('Wiley');
//            $table->string('year', 30)->nullable();
//            $table->string('author', 100)->nullable();
            $table->enum(Constants::DBC_SCHOOL_ITEM_CATEGORY, Constants::AV_SCHOOL_ITEM_CATEGORIES)->default(Constants::DBCV_SCHOOL_ITEM_EQUIPMENT); //equipment laboratory
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
        Schema::dropIfExists('library_items');
    }
}
