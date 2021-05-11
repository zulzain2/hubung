<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditUser982365 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name', 255)->nullable()->change();
            $table->string('email', 255)->nullable()->change();
            $table->string('password', 255)->nullable()->change();
            $table->string('otp' , 255)->nullable();
            $table->timestamp('otp_expired')->nullable();

            $table->string('phone_number', 255)->after('name')->nullable();
            $table->string('nick_name', 255)->after('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name', 255)->nullable(false)->change();
            $table->string('email', 255)->nullable(false)->change();
            $table->string('password', 255)->nullable(false)->change();

            $table->dropColumn('phone_number');
            $table->dropColumn('nick_name');
            $table->dropColumn('otp');
            $table->dropColumn('otp_expired');
        });
    }
}
