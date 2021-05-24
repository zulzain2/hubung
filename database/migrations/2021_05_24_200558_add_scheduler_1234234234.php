<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScheduler1234234234 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedulers', function (Blueprint $table) {
            $table->text('module')->nullable();
            $table->text('id_module')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedulers', function (Blueprint $table) {
            $table->dropColumn('module');
            $table->dropColumn('id_module');
        });
    }
}
