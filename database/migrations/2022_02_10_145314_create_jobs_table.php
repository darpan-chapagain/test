<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->nullable();;
            $table->unsignedBigInteger('job_category_id')
                ->references('job_category_id')->on('job_category')
                ->onDelete('cascade')->nullable();;
            $table->string('title')->nullable();;
            $table->string('description')->nullable();;
            $table->string('size')->nullable();;
            $table->date('time')->nullable();;
            $table->string('experience')->nullable();;
            $table->integer('salary_offered')->nullable();;
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
        Schema::dropIfExists('jobs');
    }
}
