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
        Schema::create('accesorios_productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accesorio_categoria_id')->constrained('accesorios_categorias')->onDelete('cascade');
            $table->string('orden')->nullable();
            $table->string('path')->nullable();
            $table->string('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->boolean('destacado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accesorios_productos');
    }
};
