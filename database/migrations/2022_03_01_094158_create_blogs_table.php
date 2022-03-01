<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('thumb')->nullable();
            $table->string('full_img')->nullable();
            $table->text('detail')->nullable();
            $table->integer('status')
                ->default(1)
                ->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->nullable();
        });

        // Schema::create('blogs_comment', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->unsignedBigInteger('user_id');
        //     $table->unsignedBigInteger('blog_id');
        //     $table->string('comment');
        //     $table->timestamps();
        //     $table->foreign('user_id')
        //         ->references('id')->on('users')
        //         ->onDelete('cascade')->nullable();
        //     $table->foreign('blog_id')
        //         ->references('id')->on('blogs')
        //         ->onDelete('cascade')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
