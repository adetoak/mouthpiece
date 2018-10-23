<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_video', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('product_id');
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
        Schema::drop('product_video');
    }
}
