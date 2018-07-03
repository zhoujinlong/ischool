<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 50)->unique();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->year('createdate')->comment('创办年份')->nullable();
            $table->unsignedInteger('type_id')->comment('学校类型');
            $table->unsignedInteger('category_id')->comment('高校类别');
            $table->unsignedInteger('nature_id')->comment('高校性质');
            $table->string('department')->nullable();
            $table->string('http')->nullable();
            $table->unsignedInteger('click')->default(0);
            $table->foreign('type_id')->references('id')->on('types')->onDelete('RESTRICT');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('RESTRICT');
            $table->foreign('nature_id')->references('id')->on('natures')->onDelete('RESTRICT');
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
        Schema::dropIfExists('schools');
    }
}
