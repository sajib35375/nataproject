<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProupozilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proupozilas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->foreign('division_id')->references('id')->on('prodivisions')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('prodistricts')->onDelete('cascade');
            $table->string('upozila_name');
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
        Schema::dropIfExists('proupozilas');
    }
}
