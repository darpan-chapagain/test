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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_category_id')->nullable();;
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('size')->nullable();
            $table->date('time')->nullable();
            $table->string('experience')->nullable();
            $table->integer('salary_offered')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->nullable();
            $table->foreign('job_category_id')
                ->references('job_category_id')->on('job_categories')
                ->onDelete('cascade')->nullable();
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
