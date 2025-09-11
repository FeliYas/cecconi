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
        Schema::create('galeria_accesorios', function (Blueprint $table) {
            $table->id();
            $table->string('orden')->nullable();
            $table->string('path')->nullable();
            $table->foreignId('accesorio_id')->constrained('accesorios_productos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeria_accesorios');
    }
};
