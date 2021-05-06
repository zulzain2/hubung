<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMeetinglog225363 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meeting_logs', function (Blueprint $table) {
            $table->dateTime('end_datetime')->after('datetime')->nullable();
            $table->string('status', 128)->after('datetime')->comment('S - On Schedule , P - Pass')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meeting_logs', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
