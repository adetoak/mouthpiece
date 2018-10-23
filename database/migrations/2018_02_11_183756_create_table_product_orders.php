<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('order_id');
            $table->string('reference');
            $table->string('ref_id');                                                         
            $table->string('price');
            $table->string('quantity');
            $table->string('vat');            
            $table->string('delivery_price');
            $table->string('total');
            $table->string('remark');
            $table->string('rating');
            $table->string('comment');
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
        Schema::drop('product_orders');
    }
}
