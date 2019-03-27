<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobcodes', function (Blueprint $table) {
            $table->increments('jobcode_id');
            $table->string('jobcode_name');
            $table->string('description',200)->nullable();
            $table->integer('school_id')->unsigned();
            $table->foreign('school_id')->references('school_id')->on('schools');
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
        Schema::dropIfExists('jobcodes');
    }
}
