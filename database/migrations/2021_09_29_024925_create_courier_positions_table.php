<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_positions', function (Blueprint $table) {
            $table->id();
            $table->string('mitra_id');
            $table->string('courier_id');
            $table->string('courier_posisiton_id');
            $table->text('courier_position_latitude');
            $table->text('courier_position_longitude');
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
        Schema::dropIfExists('courier_positions');
    }
}
