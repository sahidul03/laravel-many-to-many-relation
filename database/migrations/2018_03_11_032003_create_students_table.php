<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('roll');

            $table->integer('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id');
            $table->integer('district_id')->unsigned()->nullable();
            $table->foreign('district_id')->references('id');
            $table->integer('thana_id')->unsigned()->nullable();
            $table->foreign('thana_id')->references('id');
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
        Schema::drop('students');
    }
}
