<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->char('to_user')->nullable();
            $table->text('tiny_img_url')->nullable();
            $table->text('title')->nullable();
            $table->text('desc')->nullable();
            $table->char('type' , 32)->comment('I - Information; A - Approval; R - Review;')->nullable();
            $table->text('click_url')->nullable();
            $table->char('send_status')->comment('P - Pending; S - Sent; R - Received; D - Read; F - Fail')->nullable();
            $table->char('status' , 32)->nullable();
            $table->text('module')->nullable();
            $table->text('id_module')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}
