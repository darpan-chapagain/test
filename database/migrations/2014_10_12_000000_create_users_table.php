<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('Address')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->bigInteger('role_id')->unsigned()->nullable();              
            $table->rememberToken();
            $table->boolean('status')->default(true);
            $table->timestamps();
            // $table->foreign('role_id')
            //     ->references('id')->on('roles')
            //     ->onDelete('cascade')->nullable();
        });
    }

    


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
