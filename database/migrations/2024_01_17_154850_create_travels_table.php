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
        Schema::create('travels', function (Blueprint $table) {
            $table->uuid('travel_id')->primary();
            $table->string('route_name');
            $table->foreignUuid('driver_id')->references('driver_id')->on('drivers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('bus_id')->references('bus_id')->on('buses')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('departure_datetime');
            $table->dateTime('arrival_datetime');
            $table->string('travel_status');
            $table->foreignUuid('route_id')->references('route_id')->on('routes')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('estimated_time_of_arrival');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travels');
    }
};
