<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_badges', function (Blueprint $table) {
            $table->id('employee_badge_id');
            $table->unsignedBigInteger('Job_Category_Id')
                ->references('job_category_id')->on('job_category')
                ->onDelete('cascade');
            $table->unsignedBigInteger('employee_id')
                ->references('employee_id')->on('employee')
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
        Schema::dropIfExists('employee_badges');
    }
}
