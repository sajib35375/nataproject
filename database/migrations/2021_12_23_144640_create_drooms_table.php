<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dormatory_id');
            $table->foreign('dormatory_id')->references('id')->on('dormatories')->onDelete('cascade');
            $table->unsignedBigInteger('grade_id');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->unsignedBigInteger('gender_id');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->string('room_name');
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
        Schema::dropIfExists('drooms');
    }
}
