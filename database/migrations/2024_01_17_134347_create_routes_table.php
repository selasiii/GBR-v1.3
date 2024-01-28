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
        Schema::create('routes', function (Blueprint $table) {
            $table->uuid('route_id')->primary();
            $table->string('route_name');
            $table->foreignUuid('start_terminal_id')->references('terminal_id')->on('terminals')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('end_terminal_id')->references('terminal_id')->on('terminals')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
