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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion'); // TEXT
            $table->decimal('precio', 10, 2); // DECIMAL(10, 2)
            $table->string('imagen', 100); // VARCHAR(100)
            $table->unsignedBigInteger('categoria_id'); // BIGINT(20)
            $table->unsignedBigInteger('vendedor_id'); // BIGINT(20)
            
            // Creamos la FK "categoria_id“ que hace referencia al "id" de la tabla "categorias"
            $table->foreign('categoria_id')->references('id')->on('categorias');
            // Creamos la FK "vendedor_id“ que hace referencia al "id" de la tabla "users"
            $table->foreign('vendedor_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
