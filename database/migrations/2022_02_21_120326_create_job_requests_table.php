<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_requests', function (Blueprint $table) {
            $table->id('job_employement_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('job_id');
            $table->integer('status')->default(1);
            $table->foreign('employee_id')
                ->references('employee_id')->on('employees')
                ->onDelete('cascade')->nullable();
            $table->timestamps();
            $table->foreign('job_id') 
            ->references('id')->on('jobs')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_requests');
    }
}
