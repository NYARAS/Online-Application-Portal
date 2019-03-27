<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('post_id');
            $table->integer('jobtitle_id')->unsigned();
            $table->integer('school_id')->unsigned();
            $table->integer('jobcode_id')->unsigned();
            $table->integer('grade_id')->unsigned();
            $table->boolean('user_id');
            $table->text('post_body');
            $table->foreign('jobtitle_id')->references('jobtitle_id')->on('jobtitles');
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->foreign('jobcode_id')->references('jobcode_id')->on('jobcodes');
            $table->foreign('grade_id')->references('grade_id')->on('grades');
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
