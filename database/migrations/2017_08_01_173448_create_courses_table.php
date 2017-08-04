<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rank_id')->unsigned();
            $table->foreign('rank_id')->references('id')->on('ranks');
            $table->string('name');
            $table->string('filepath');
            $table->integer('course_type_id')->unsigned();
            $table->foreign('course_type_id')->references('id')->on('course_types');
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
        Schema::dropIfExists('courses');
    }
}
