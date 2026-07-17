<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

final class CategorySeeder extends Seeder
{
    /**
     * Inserta las categorías iniciales de la escuela.
     */
    public function run(): void
    {
        $categories = [

            [
                'name'        => 'Chupetines',
                'responsible' => 'Mario',
                'active'      => true,
            ],

            [
                'name'        => 'Prebenjamín',
                'responsible' => 'Mario',
                'active'      => true,
            ],

            [
                'name'        => 'Benjamín',
                'responsible' => 'Mario',
                'active'      => true,
            ],

            [
                'name'        => 'Alevín',
                'responsible' => 'Mario',
                'active'      => true,
            ],

            [
                'name'        => 'Infantil',
                'responsible' => 'Mario',
                'active'      => true,
            ],

            [
                'name'        => 'Cadete',
                'responsible' => 'Mario',
                'active'      => true,
            ],

            [
                'name'        => 'Juvenil',
                'responsible' => 'Mario',
                'active'      => true,
            ],

        ];

        foreach ($categories as $category) {

            Category::updateOrCreate(

                [
                    'name' => $category['name'],
                ],

                $category

            );

        }
    }
}