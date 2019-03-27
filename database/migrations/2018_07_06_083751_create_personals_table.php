<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->increments('applicant_id');
            $table->string('first_name',20);
            $table->string('second_name',20);
            $table->string('last_name',20)->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('dob');
            $table->string('status');
            $table->string('national_id_card',50)->nullable();
            $table->string('passport',50)->nullable();
            $table->string('primary_phone_nummber',50)->nullable();
            $table->string('secondary_phone_nummber',50)->nullable();
            $table->string('curriculum_vitae',50);
            $table->string('cover_letter',50);
            $table->string('province',50)->nullable();
            $table->string('current_address',100)->nullable();
          
            $table->string('date_applied');
            $table->string('applicant_photo',200)->nullable();
            $table->string('qualified_candidate',200)->nullable();


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
        Schema::dropIfExists('personals');
    }
}
