<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpa a tabela de categorias para evitar duplicatas em execuções repetidas
        Category::truncate();

        // Cria categorias específicas
        Category::create(['name' => 'Suporte Técnico']);
        Category::create(['name' => 'Financeiro']);
        Category::create(['name' => 'Recursos Humanos']);
        Category::create(['name' => 'Vendas']);
        Category::create(['name' => 'Marketing']);

        // Opcional:  pode criar categorias usando a factory para dados aleatórios
        // Category::factory()->count(5)->create();
    }
}
