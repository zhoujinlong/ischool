<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SchoolsAddArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->string('province')->nullable()->comment('省份')->after('name');
            $table->string('city')->nullable()->comment('城市')->after('province');
            $table->string('district')->nullable()->comment('地区')->after('city');
            $table->unsignedInteger('province_code')->nullable()->after('province');
            $table->unsignedInteger('city_code')->nullable()->after('city');
            $table->unsignedInteger('district_code')->nullable()->after('district');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->dropColumn('province');
            $table->dropColumn('city');
            $table->dropColumn('district');
            $table->dropColumn('province_code');
            $table->dropColumn('city_code');
            $table->dropColumn('district_code');
        });
    }
}
