<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crea la tabla de categorías de la escuela.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table): void {

            /*
            |--------------------------------------------------------------------------
            | CLAVE PRIMARIA
            |--------------------------------------------------------------------------
            */

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | INFORMACIÓN DE LA CATEGORÍA
            |--------------------------------------------------------------------------
            */

            $table->string('name', 100);

            $table->string('responsible', 150);

            /*
            |--------------------------------------------------------------------------
            | ESTADO
            |--------------------------------------------------------------------------
            */

            $table->boolean('active')
                  ->default(true);

            /*
            |--------------------------------------------------------------------------
            | FECHAS
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | RESTRICCIONES
            |--------------------------------------------------------------------------
            */

            $table->unique('name');
        });
    }

    /**
     * Elimina la tabla.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};