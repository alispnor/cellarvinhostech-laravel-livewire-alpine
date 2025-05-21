<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\User; 

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpa a tabela de chamados para evitar duplicatas
        Ticket::truncate();

        // Certifique-se de que existem categorias
        if (Category::count() === 0) {
            $this->call(CategorySeeder::class); // Chama o CategorySeeder se não houver categorias
        }

        $categories = Category::all();
        $users = User::all(); // Pega todos os usuários (se você tem autenticação e seed de usuários)

        // Cria 50 chamados
        Ticket::factory()->count(50)->create([
            'category_id' => function () use ($categories) {
                // Associa o chamado a uma categoria aleatória
                return $categories->random()->id;
            },
            'created_by' => function () use ($users) {
                // Associa o chamado a um usuário aleatório, se houver usuários
                return $users->isNotEmpty() ? $users->random()->id : null;
            },
        ]);

        // Exemplo de criação de um chamado específico se precisar
        // Ticket::create([
        //     'title' => 'Problema com Acesso ao Sistema',
        //     'description' => 'Não consigo logar no sistema após a atualização de ontem.',
        //     'status' => 'aberto',
        //     'category_id' => $categories->where('name', 'Suporte Técnico')->first()->id,
        //     'created_by' => $users->first()->id ?? null,
        // ]);
    }
}
