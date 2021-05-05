<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelemetriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telemetries', function (Blueprint $table) {
            $table->id();
            $table->integer('device_id');
			$table->unsignedDouble('bpm');
			$table->unsignedDouble('spo2');
			$table->unsignedDouble('temperature');
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
        Schema::dropIfExists('telemetries');
    }
}
