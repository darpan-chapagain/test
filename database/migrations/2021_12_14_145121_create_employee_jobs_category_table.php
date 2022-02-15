<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeJobsCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_jobs_category', function (Blueprint $table) {
            $table->id('employee_job_category_id');
            $table->unsignedBigInteger('job_category_id')
                ->references('job_category_id')->on('job_category')
                ->onDelete('cascade');
            $table->unsignedBigInteger('employee_id')
                ->references('employee_id')->on('employee')
                ->onDelete('cascade');;
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
        Schema::dropIfExists('eomployee_jobs_category');
    }
}
