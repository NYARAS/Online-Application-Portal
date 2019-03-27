<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PersonalInformation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('last_name');
            $table->integer('user_id');
            $table->integer('post_id');
            $table->integer('school_id');
            $table->string('physical_address');
            $table->string('box_number');
            $table->string('country');
            $table->string('city');
            $table->string('mobile_number');
            $table->string('photo_image');
            $table->string('cover_letter');
            $table->string('curriculum_vitae');
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
        Schema::dropIfExists('PersonalInformation');
    }
}
