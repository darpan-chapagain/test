<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_badges', function (Blueprint $table) {
            $table->id('work_badge_id');
            $table->unsignedBigInteger('Job_Category_Id')
                ->references('job_category_id')->on('job_category')
                ->onDelete('cascade');
            $table->string('Badge_Name');
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
        Schema::dropIfExists('work_badges');
    }
}
