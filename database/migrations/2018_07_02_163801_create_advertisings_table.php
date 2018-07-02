<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('advertising_space_id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->unsignedInteger('sort')->default(0);
            $table->foreign('advertising_space_id')->references('id')->on('advertising_spaces')->onDelete('cascade');
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
        Schema::dropIfExists('advertisings');
    }
}
