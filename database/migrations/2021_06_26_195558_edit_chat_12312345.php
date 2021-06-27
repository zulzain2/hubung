<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditChat12312345 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->text('status_user_other')->comment('U - Unsent, S - Sent, R - Read')->after('parent')->nullable();
            $table->text('status_user')->comment('U - Unsent, S - Sent, R - Read')->after('parent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->dropColumn('status_user_other');
            $table->dropColumn('status_user');
            $table->text('status')->comment('U - Unsent, S - Sent, R - Read')->after('parent')->nullable();
        });
    }
}
