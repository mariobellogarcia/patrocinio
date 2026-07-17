<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crea la tabla de jugadores de la escuela.
     */
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table): void {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | RELACIÓN CON LA CATEGORÍA
            |--------------------------------------------------------------------------
            */

            $table->foreignId('category_id')
                ->constrained('categories')
                ->restrictOnDelete();

            /*
            |--------------------------------------------------------------------------
            | DATOS DEL MENOR
            |--------------------------------------------------------------------------
            */

            $table->string('first_name', 100);

            $table->string('last_name', 100);

            $table->string('second_last_name', 100)
                ->nullable();

            $table->date('birth_date');

            $table->enum('gender', [
                'male',
                'female',
                'other',
                'not_specified',
            ]);

            /*
             * El formulario permitirá escribir 0 cuando el menor
             * no tenga DNI, pero Laravel lo convertirá en NULL.
             *
             * Usamos text porque posteriormente cifraremos el DNI.
             */
            $table->text('dni')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | DATOS DE CONTACTO
            |--------------------------------------------------------------------------
            */

            $table->string('contact_phone', 9);

            $table->string('contact_email', 255);

            /*
            |--------------------------------------------------------------------------
            | EQUIPACIÓN
            |--------------------------------------------------------------------------
            */

            $table->string('equipment_size', 20)
                ->nullable();

            $table->string('tracksuit_size', 20)
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | ESTADO
            |--------------------------------------------------------------------------
            */

            $table->enum('status', [
                'pending',
                'accepted',
                'waiting_list',
                'rejected',
                'cancelled',
            ])->default('pending');

            $table->timestamp('registered_at');

            /*
            |--------------------------------------------------------------------------
            | FECHAS AUTOMÁTICAS
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | ÍNDICES
            |--------------------------------------------------------------------------
            */

            $table->index('category_id');
            $table->index('birth_date');
            $table->index('contact_email');
            $table->index('status');
        });
    }

    /**
     * Elimina la tabla de jugadores.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};