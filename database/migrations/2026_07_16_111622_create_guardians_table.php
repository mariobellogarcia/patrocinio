<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crea la tabla de responsables legales de los jugadores.
     */
    public function up(): void
    {
        Schema::create('guardians', function (Blueprint $table): void {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | RELACIÓN CON EL JUGADOR
            |--------------------------------------------------------------------------
            */

            $table->foreignId('player_id')
                ->constrained('players')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | TIPO DE RESPONSABLE
            |--------------------------------------------------------------------------
            */

            $table->enum('relationship', [
                'father',
                'mother',
                'legal_guardian',
            ]);

            /*
            |--------------------------------------------------------------------------
            | DATOS PERSONALES
            |--------------------------------------------------------------------------
            */

            $table->string('first_name', 100);

            $table->string('last_name', 100);

            $table->string('second_last_name', 100)
                ->nullable();

            /*
             * Se almacenará cifrado desde el modelo.
             */
            $table->text('dni');

            /*
            |--------------------------------------------------------------------------
            | DATOS DE CONTACTO
            |--------------------------------------------------------------------------
            */

            $table->string('phone', 9);

            $table->string('secondary_phone', 9)
                ->nullable();

            $table->string('email', 255);

            /*
            |--------------------------------------------------------------------------
            | DIRECCIÓN
            |--------------------------------------------------------------------------
            */

            $table->string('address', 255);

            $table->string('city', 100);

            $table->string('postal_code', 5);

            /*
            |--------------------------------------------------------------------------
            | ACEPTACIÓN DE NORMAS Y PROTECCIÓN DE DATOS
            |--------------------------------------------------------------------------
            */

            $table->boolean('school_rules_accepted')
                ->default(false);

            $table->timestamp('school_rules_accepted_at')
                ->nullable();

            $table->boolean('privacy_accepted')
                ->default(false);

            $table->timestamp('privacy_accepted_at')
                ->nullable();

            /*
             * La autorización de imagen es opcional.
             */
            $table->boolean('image_consent')
                ->default(false);

            $table->timestamp('image_consent_at')
                ->nullable();

            /*
             * Permite saber qué versión de los textos legales aceptó.
             */
            $table->string('legal_text_version', 30);

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

            $table->index('player_id');
            $table->index('email');
            $table->index('phone');
        });
    }

    /**
     * Elimina la tabla de responsables legales.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};