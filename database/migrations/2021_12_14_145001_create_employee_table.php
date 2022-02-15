<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id('employee_id');
            $table->unsignedBigInteger('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('qualification');
            $table->integer('hourly_rate');
            $table->float('rating');
            $table->string('experience');
            $table->string('skills');
            $table->string('employee_type');
            $table->integer('Job_Category_ID');
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
        Schema::dropIfExists('employee');
    }
}
