<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodistricts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id')->references('id')->on('prodivisions')->onDelete('cascade');
            $table->string('district_name');
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
        Schema::dropIfExists('prodistricts');
    }
}
