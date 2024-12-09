<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('itineraries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reserve_id')->constrained()->onDelete('cascade'); // Relación con la tabla de reservas (si es necesario)
            $table->string('departure_city'); // Ciudad de salida
            $table->string('arrival_city'); // Ciudad de llegada
            $table->timestamp('departure_time'); // Hora de salida
            $table->timestamp('arrival_time')->nullable(); // Hora de llegada (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itineraries');
    }
};
