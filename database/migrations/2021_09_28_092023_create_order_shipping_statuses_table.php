<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderShippingStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_shipping_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('order_shipping_id');
            $table->string('order_shipping_status_id');
            $table->string('order_shipping_status_note')->nullable();
            $table->enum('order_shipping_status', ['PENDING', 'ONGOING', 'COMPLETED', 'CANCELED'])->default('PENDING');
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
        Schema::dropIfExists('order_shipping_statuses');
    }
}
