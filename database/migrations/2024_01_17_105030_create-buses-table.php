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
        Schema::create('buses', function (Blueprint $table) {
            $table->uuid('bus_id')->primary();
            $table->string('bus_number')->unique();
            $table->integer('capacity');
            $table->string('model');
            $table->string('make');
            $table->string('year');
            $table->string('color');
            $table->enum('status',['active', 'inactive'])->default('active');
            $table->enum('bus_state',['working', 'faulty', 'damaged'])->default('working');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
