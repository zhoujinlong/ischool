<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdvertisingSpacesAddImgsize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertising_spaces', function (Blueprint $table) {
            $table->unsignedInteger('img_width')->nullable()->after('name');
            $table->unsignedInteger('img_height')->nullable()->after('img_width');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertising_spaces', function (Blueprint $table) {
            $table->dropColumn('img_width');
            $table->dropColumn('img_height');
        });
    }
}
