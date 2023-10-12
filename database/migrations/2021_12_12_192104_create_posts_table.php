<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_des');
            $table->longText('long_des');
            $table->string('photo')->nullable();
            $table->integer('location')->nullable();
            $table->integer('background')->nullable();
            $table->integer('vm')->nullable();
            $table->integer('function')->nullable();
            $table->integer('value')->nullable();
            $table->integer('activity')->nullable();
            $table->integer('stakeholder')->nullable();
            $table->integer('organogram')->nullable();
            $table->integer('statistic')->nullable();
            $table->integer('physical')->nullable();
            $table->integer('importance')->nullable();
            $table->integer('training')->nullable();
            $table->integer('nata_Strengthening')->nullable();
            $table->integer('resources')->nullable();
            $table->integer('notice')->nullable();
            $table->integer('home')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('posts');
    }
}
