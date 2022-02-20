<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_request', function (Blueprint $table) {
            $table->id('job_employement_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('job_id')
                ->references('job_id')->on('post_jobs')
                ->onDelete('cascade');
            $table->string('status');
            $table->foreign('employee_id')
                ->references('employee_id')->on('employees')
                ->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('job_request');
    }
}
