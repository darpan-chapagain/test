<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeJobCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee__job_categories', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('job_category_id');

            $table->unsignedBigInteger('employee_id');
            $table->foreign('job_category_id')
                ->references('job_category_id')->on('job_categories')
                ->onDelete('cascade');
            $table->foreign('employee_id')
                ->references('employee_id')->on('employees')
                ->onDelete('cascade');
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
        Schema::dropIfExists('employee__job_categories');
    }
}
