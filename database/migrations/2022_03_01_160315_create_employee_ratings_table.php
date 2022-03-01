<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_ratings', function (Blueprint $table) {
            $table->id('id');
            $table->float('rating')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('job_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->nullable();
            $table->foreign('employee_id')
                ->references('employee_id')->on('employees')
                ->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('employee_ratings');
    }
}
