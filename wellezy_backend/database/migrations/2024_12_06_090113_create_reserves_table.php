<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id')->constrained('flights')->onDelete('cascade');
            $table->string('departure_city');
            $table->string('arrival_city');
            $table->dateTime('departure_time');
            // Agrega otros campos si es necesario
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reserves');
    }
}
