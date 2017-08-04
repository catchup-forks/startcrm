<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('rank_id')->unsigned();
            $table->foreign('rank_id')->references('id')->on('ranks');
            $table->string('fullname')->default(App\Profile::DEFAULT_NAME);
            $table->date('dob')->nullable();
            $table->integer('age')->unsigned()->nullable();
            $table->integer('gender_id')->unsigned()->default(1);
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->string('email')->nullable();
            $table->string('mailaddr')->nullable();
            $table->string('contacthp')->nullable();
            $table->string('contacthome')->nullable();
            $table->string('image_filepath')->default(App\Profile::DEFAULT_IMAGE);
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
        Schema::dropIfExists('profiles');
    }
}
