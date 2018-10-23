<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailConfirm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('users', function($table)
        {
            $table->boolean('confirmed')->default(0);
            $table->string('token', 254)->nullable();

        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('users', function($table)
        {
            $table->drop_column('confirmed');
            $table->drop_column('token');            
        });*/
    }
}
