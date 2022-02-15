<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_jobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->unsignedBigInteger('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('job_category_id')
                ->references('job_category_id')->on('job_category')
                ->onDelete('cascade');
            $table->string('title');
            $table->string('description');
            $table->string('size');
            $table->date('time');
            $table->string('experience');
            $table->integer('salary_offered');
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
        //
    }
}
