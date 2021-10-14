<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra_fees', function (Blueprint $table) {
            $table->id();
            $table->string('mitra_fee_id');
            $table->enum('mitra_fee_type', ['FLAT', 'PERCENTAGE']);
            $table->decimal('mitra_fee', 12, 2)->default(0.00);
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
        Schema::dropIfExists('mitra_fees');
    }
}
