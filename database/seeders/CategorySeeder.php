<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Programación',
            'slug' => 'programacion',
            'description' => 'Libros sobre desarrollo de software',
            'color' => '#3B82F6'
        ]);

        Category::create([
            'name' => 'Base de Datos',
            'slug' => 'base-de-datos',
            'description' => 'SQL, NoSQL y diseño',
            'color' => '#10B981'
        ]);
    }
}