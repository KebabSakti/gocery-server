<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('payment_id');
            $table->text('payment_invoice_id')->nullable();
            $table->text('payment_user_id')->nullable();
            $table->text('payment_url')->nullable();
            $table->text('payment_method')->nullable();
            $table->text('payment_currency')->nullable();
            $table->timestamp('payment_expiry_date')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
