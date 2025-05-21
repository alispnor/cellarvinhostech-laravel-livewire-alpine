<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Ticket;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria 5 categorias
        // Category::factory()->count(5)->create();

        // Cria 50 chamados, associando-os aleatoriamente às categorias existentes
        // Ticket::factory()->count(50)->create();

        $this->call(CategorySeeder::class);
        $this->call(TicketSeeder::class);
    }
}
