<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('address')->nullable();
            $table->string('config_password')->nullable();
            $table->string('message')->nullable();
            $table->string('message_foruser')->nullable();
            $table->boolean('rate')->default(true);
            $table->integer('rate_account')->nullable();
            $table->integer('image_frame')->default(1);
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
        Schema::dropIfExists('config');
    }
}
