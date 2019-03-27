<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('email');
            $table->string('nationality',200);
            $table->string('status',200);
            $table->string('primary_phone_number',200);
            $table->string('secondary_phone_number',200)->nullable();
            $table->string('secondary');
            $table->string('secondary_file');
            $table->string('university');
            $table->string('university_file');
            $table->string('other_qualifications',200)->nullable();
            $table->string('other_qualification_file')->nullable();
            $table->string('research_experience',200)->nullable();
            $table->string('employment_position',200)->nullable();
            $table->string('place_of_employment',200)->nullable();
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('campuses');
            $table->string('mode_of_study');
            $table->string('date_of_commencement');
            $table->string('date_of_completion');
            $table->string('referees');
            $table->string('any_other',200)->nullable();
          
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
        Schema::dropIfExists('admissions');
    }
}
