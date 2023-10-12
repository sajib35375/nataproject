<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('apply_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('dormatory_id');
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('room_id');
            $table->foreign('dormatory_id')->references('id')->on('dormatories')->onDelete('cascade');
            $table->foreign('apply_id')->references('id')->on('applies')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('drooms')->onDelete('cascade');
            $table->date('validity')->nullable();
            $table->date('start')->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
