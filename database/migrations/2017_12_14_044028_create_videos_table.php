<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_video', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('service_id');
            $table->string('title');         
            $table->string('video_path');                                    
            $table->boolean('verification');                                    
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
        Schema::drop('service_video');
    }
}
