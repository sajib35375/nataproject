<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('session_id')->nullable();
            $table->string('name_en');
            $table->string('name_bn');
            $table->unsignedBigInteger('national_id');
            $table->date('date_of_birth')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('religion')->nullable();
            $table->string('organization_name')->nullable();
            $table->integer('order')->nullable();
            $table->string('head_of_organization')->nullable();
            $table->string('designation');
            $table->string('cadre_num')->nullable();
            $table->string('cadre_name')->nullable();
            $table->string('pay_grade')->nullable();
            $table->string('controlling_officer')->nullable();
            $table->string('working_station');
            $table->unsignedBigInteger('p_division')->nullable();
            $table->unsignedBigInteger('p_district')->nullable();
            $table->unsignedBigInteger('p_upozila')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('office_email')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('degree')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('university')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('house_no')->nullable();
            $table->unsignedBigInteger('a_divisaion')->nullable();
            $table->unsignedBigInteger('b_district')->nullable();
            $table->unsignedBigInteger('c_upozila')->nullable();
            $table->string('e_name')->nullable();
            $table->string('e_relation')->nullable();
            $table->string('e_phone')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->date('validity');
            $table->integer('first_id')->nullable();
            $table->integer('last_id')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('applies');
    }
}
