<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTemporariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_temporaries', function (Blueprint $table) {
            $table->id();
            $table->string('name' , 255)->nullable();
            $table->string('nick_name' , 255)->nullable();
            $table->string('phone_number' , 255)->nullable();
            $table->string('email' , 255)->nullable();
            $table->unique('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password' , 255)->nullable();
            $table->string('remember_token' , 100)->nullable();
            $table->string('otp' , 255)->nullable();
            $table->timestamp('otp_expired')->nullable();
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
        Schema::dropIfExists('user_temporaries');
    }
}
