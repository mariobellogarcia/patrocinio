<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Category extends Model
{
    /**
     * Campos que pueden guardarse mediante asignación masiva.
     */
    protected $fillable = [
        'name',
        'responsible',
        'active',
    ];

    /**
     * Conversión automática de tipos.
     */
    protected function casts(): array
    {
        return [
            'active' => 'boolean',
        ];
    }
}