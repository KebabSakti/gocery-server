<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('order_id');
            $table->string('order_shipping_id');
            $table->string('product_id');
            $table->text('product_name');
            $table->text('product_description');
            $table->text('product_cover');
            $table->decimal('product_price');
            $table->integer('product_point')->default(0);
            $table->string('order_item_id');
            $table->text('order_item_note');
            $table->integer('order_item_qty');
            $table->decimal('order_item_price');
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
        Schema::dropIfExists('order_items');
    }
}
