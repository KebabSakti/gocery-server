<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerLinkedAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_linked_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('customer_linked_account_id');
            $table->string('customer_linked_account_name')->nullable();
            $table->string('customer_linked_account_email')->nullable();
            $table->string('customer_linked_account_type')->nullable();
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
        Schema::dropIfExists('customer_linked_accounts');
    }
}
