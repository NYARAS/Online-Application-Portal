<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('email');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('last_name');
            $table->string('years');
            $table->string('months');
            $table->string('first_institution');
            $table->string('workedas1');
            $table->string('from1');
            $table->string('to1');
            $table->string('second_institution');
            $table->string('workedas2');
            $table->string('from2');
            $table->string('to2');
            $table->string('third_institution');
            $table->string('workedas3');
            $table->string('from3');
            $table->string('to3');
          
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
        Schema::dropIfExists('experiences');
    }
}
