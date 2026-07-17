<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Player extends Model
{
    /**
     * Campos permitidos para asignación masiva.
     */
    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'second_last_name',
        'birth_date',
        'gender',
        'dni',
        'contact_phone',
        'equipment_size',
        'tracksuit_size',
        'status',
        'registered_at',
    ];

    /**
     * Conversión automática de tipos.
     */
    protected function casts(): array
    {
        return [
            'birth_date'    => 'date',
            'registered_at' => 'datetime',
            'dni'           => 'encrypted',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */

    /**
     * Un jugador pertenece a una categoría.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Un jugador puede tener uno o varios responsables.
     */
    public function guardians(): HasMany
    {
        return $this->hasMany(Guardian::class);
    }
}