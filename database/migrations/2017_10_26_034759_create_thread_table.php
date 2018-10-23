<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread_table', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('msg_from');
            $table->integer('msg_to');
            $table->string('message_id');         
            $table->string('reference');                        
            $table->integer('ref_id'); 
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
        Schema::drop('thread_table');
    }
}
