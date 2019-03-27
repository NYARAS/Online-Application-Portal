<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
          $table->increments('status_id');
            $table->integer('applicant_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->foreign('applicant_id')->references('applicant_id')->on('personals');
            $table->foreign('post_id')->references('post_id')->on('posts');
          
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
        Schema::dropIfExists('statuses');
    }
}
