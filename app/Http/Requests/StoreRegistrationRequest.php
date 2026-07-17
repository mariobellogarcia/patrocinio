<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\ValidSpanishDni;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class StoreRegistrationRequest extends FormRequest
{
    /**
     * El formulario es público.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Limpia y normaliza la información antes de validarla.
     */
    protected function prepareForValidation(): void
    {
        $player = $this->input('player', []);
        $guardian = $this->input('guardian', []);

        $playerDni = $this->normalizeDni(
            $player['dni'] ?? null
        );

        /*
         * El formulario admite 0 cuando el menor no tiene DNI,
         * pero en la aplicación se convierte en NULL.
         */
        if ($playerDni === '0' || $playerDni === '') {
            $playerDni = null;
        }

        $player['dni'] = $playerDni;

        $player['contact_phone'] = $this->normalizePhone(
            $player['contact_phone'] ?? null
        );


        $guardian['dni'] = $this->normalizeDni(
            $guardian['dni'] ?? null
        );

        $guardian['phone'] = $this->normalizePhone(
            $guardian['phone'] ?? null
        );

        $guardian['secondary_phone'] = $this->normalizePhone(
            $guardian['secondary_phone'] ?? null
        );

        $guardian['email'] = $this->normalizeEmail(
            $guardian['email'] ?? null
        );

        $this->merge([
            'player' => $player,
            'guardian' => $guardian,
        ]);
    }

    /**
     * Reglas que Laravel aplicará antes de ejecutar el controlador.
     */
    public function rules(): array
    {
        $namePattern = "/^[\p{L}\s'-]+$/u";

        return [
            /*
            |--------------------------------------------------------------------------
            | Jugador
            |--------------------------------------------------------------------------
            */

            'player.first_name' => [
                'required',
                'string',
                'max:100',
                "regex:{$namePattern}",
            ],

            'player.last_name' => [
                'required',
                'string',
                'max:100',
                "regex:{$namePattern}",
            ],

            'player.second_last_name' => [
                'nullable',
                'string',
                'max:100',
                "regex:{$namePattern}",
            ],

            'player.birth_date' => [
                'required',
                'date_format:d/m/Y',
                'before:today',
            ],

            'player.gender' => [
                'required',
                Rule::in([
                    'male',
                    'female',
                    'other',
                    'not_specified',
                ]),
            ],

            'player.dni' => [
                'nullable',
                new ValidSpanishDni(),
            ],

            'player.contact_phone' => [
                'required',
                'regex:/^[0-9]{9}$/',
            ],

        
            'player.category_id' => [
                'required',
                'integer',
                Rule::exists('categories', 'id')
                    ->where('active', true),
            ],

            /*
            |--------------------------------------------------------------------------
            | Padre, madre o tutor
            |--------------------------------------------------------------------------
            */

            'guardian.relationship' => [
                'required',
                Rule::in([
                    'father',
                    'mother',
                    'legal_guardian',
                ]),
            ],

            'guardian.first_name' => [
                'required',
                'string',
                'max:100',
                "regex:{$namePattern}",
            ],

            'guardian.last_name' => [
                'required',
                'string',
                'max:100',
                "regex:{$namePattern}",
            ],

            'guardian.second_last_name' => [
                'nullable',
                'string',
                'max:100',
                "regex:{$namePattern}",
            ],

            'guardian.dni' => [
                'required',
                new ValidSpanishDni(),
            ],

            'guardian.phone' => [
                'required',
                'regex:/^[0-9]{9}$/',
            ],

            'guardian.secondary_phone' => [
                'nullable',
                'regex:/^[0-9]{9}$/',
            ],

            'guardian.email' => [
                'required',
                'email:rfc',
                'max:255',
            ],

            'guardian.address' => [
                'required',
                'string',
                'max:255',
            ],

            'guardian.city' => [
                'required',
                'string',
                'max:100',
                "regex:{$namePattern}",
            ],

            'guardian.postal_code' => [
                'required',
                'regex:/^[0-9]{5}$/',
            ],

            /*
            |--------------------------------------------------------------------------
            | Consentimientos
            |--------------------------------------------------------------------------
            */

            'guardian.school_rules_accepted' => [
                'accepted',
            ],

            'guardian.privacy_accepted' => [
                'accepted',
            ],

            'guardian.image_consent' => [
                'sometimes',
                'accepted',
            ],
        ];
    }

    /**
     * Mensajes que verá el usuario.
     */
    public function messages(): array
    {
        return [
            'required' =>
                'El campo :attribute es obligatorio.',

            '*.regex' =>
                'El formato de :attribute no es válido.',

            'player.birth_date.date_format' =>
                'La fecha de nacimiento debe tener el formato dd/mm/aaaa.',

            'player.birth_date.before' =>
                'La fecha de nacimiento debe ser anterior al día de hoy.',

            'player.contact_phone.regex' =>
                'El teléfono de contacto debe tener exactamente 9 números.',

            'guardian.phone.regex' =>
                'El teléfono del responsable debe tener exactamente 9 números.',

            'guardian.secondary_phone.regex' =>
                'El segundo teléfono debe tener exactamente 9 números.',

            'player.contact_email.email' =>
                'El correo de contacto no tiene un formato válido.',

            'guardian.email.email' =>
                'El correo del responsable no tiene un formato válido.',

            'guardian.postal_code.regex' =>
                'El código postal debe contener exactamente 5 números.',

            'player.category_id.exists' =>
                'La categoría seleccionada no existe o no está activa.',

            'guardian.school_rules_accepted.accepted' =>
                'Debes aceptar el régimen interno y las normas de la escuela.',

            'guardian.privacy_accepted.accepted' =>
                'Debes aceptar la información sobre protección de datos.',
        ];
    }

    /**
     * Sustituye nombres técnicos por nombres legibles.
     */
    public function attributes(): array
    {
        return [
            'player.first_name' => 'nombre del jugador',
            'player.last_name' => 'primer apellido del jugador',
            'player.second_last_name' => 'segundo apellido del jugador',
            'player.birth_date' => 'fecha de nacimiento',
            'player.gender' => 'sexo',
            'player.dni' => 'DNI del jugador',
            'player.contact_phone' => 'teléfono de contacto',
            'player.category_id' => 'categoría',

            'guardian.relationship' => 'relación con el menor',
            'guardian.first_name' => 'nombre del responsable',
            'guardian.last_name' => 'primer apellido del responsable',
            'guardian.second_last_name' => 'segundo apellido del responsable',
            'guardian.dni' => 'DNI del responsable',
            'guardian.phone' => 'teléfono del responsable',
            'guardian.secondary_phone' => 'segundo teléfono',
            'guardian.email' => 'correo del responsable',
            'guardian.address' => 'dirección',
            'guardian.city' => 'localidad',
            'guardian.postal_code' => 'código postal',
        ];
    }

    private function normalizeDni(mixed $value): string
    {
        return strtoupper(
            preg_replace(
                '/[^0-9A-Za-z]/',
                '',
                trim((string) $value)
            ) ?? ''
        );
    }

    private function normalizePhone(mixed $value): ?string
    {
        if ($value === null || trim((string) $value) === '') {
            return null;
        }

        $phone = preg_replace(
            '/\D/',
            '',
            (string) $value
        ) ?? '';

        return $phone !== '' ? $phone : null;
    }

    private function normalizeEmail(mixed $value): string
    {
        return strtolower(trim((string) $value));
    }
}