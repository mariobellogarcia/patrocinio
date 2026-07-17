<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Guardian extends Model
{
    /**
     * Campos permitidos para asignación masiva.
     */
    protected $fillable = [
        'player_id',
        'relationship',
        'first_name',
        'last_name',
        'second_last_name',
        'dni',
        'phone',
        'secondary_phone',
        'email',
        'address',
        'city',
        'postal_code',
        'school_rules_accepted',
        'school_rules_accepted_at',
        'privacy_accepted',
        'privacy_accepted_at',
        'image_consent',
        'image_consent_at',
        'legal_text_version',
    ];

    /**
     * Conversión automática de tipos.
     */
    protected function casts(): array
    {
        return [
            'dni' => 'encrypted',

            'school_rules_accepted' => 'boolean',
            'privacy_accepted' => 'boolean',
            'image_consent' => 'boolean',

            'school_rules_accepted_at' => 'datetime',
            'privacy_accepted_at' => 'datetime',
            'image_consent_at' => 'datetime',
        ];
    }

    /**
     * Responsable asociado al jugador.
     */
    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
}