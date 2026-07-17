<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class ValidSpanishDni implements ValidationRule
{
    /**
     * Letras oficiales utilizadas para calcular
     * la letra de control de un DNI español.
     */
    private const CONTROL_LETTERS = 'TRWAGMYFPDXBNJZSQVHLCKE';

    /**
     * Valida el formato y la letra de control del DNI.
     */
    public function validate(
        string $attribute,
        mixed $value,
        Closure $fail
    ): void {
        if (!is_string($value)) {
            $fail('El :attribute no es válido.');

            return;
        }

        $dni = strtoupper(trim($value));

        /*
         * Debe contener exactamente:
         * - 8 números
         * - 1 letra
         */
        if (!preg_match('/^[0-9]{8}[A-Z]$/', $dni)) {
            $fail(
                'El :attribute debe contener 8 números y una letra.'
            );

            return;
        }

        $number = (int) substr($dni, 0, 8);
        $providedLetter = substr($dni, -1);

        $expectedLetter =
            self::CONTROL_LETTERS[$number % 23];

        if ($providedLetter !== $expectedLetter) {
            $fail(
                'La letra del :attribute no es correcta.'
            );
        }
    }
}