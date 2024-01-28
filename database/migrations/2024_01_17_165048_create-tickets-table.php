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
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('ticket_id')->primary();
            $table->date('issued_date');
            $table->date('expiry_date');
            $table->double('price');
            $table->enum('status', ['valid', 'invalid'])->default('valid');
            $table->foreignUuid('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('travel_id')->references('travel_id')->on('travels')->onUpdate('cascade')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
