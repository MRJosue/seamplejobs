<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Agregamos el seeder de salario
        $this->call(SalarioSeeder::class);
        $this->call(CategoriasSeeder::class);
    }
}
