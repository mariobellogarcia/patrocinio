<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Ejecuta todos los seeders de la aplicación.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
        ]);
    }
}