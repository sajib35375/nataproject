<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerupozilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perupozilas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->foreign('division_id')->references('id')->on('perdivisions')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('perdistricts')->onDelete('cascade');
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
        Schema::dropIfExists('perupozilas');
    }
}
