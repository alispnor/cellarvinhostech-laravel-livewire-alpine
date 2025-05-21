<?php

namespace Tests\Feature;

use App\Models\Category; 
use App\Models\Ticket;   
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_category_cannot_be_deleted_if_it_has_associated_tickets()
    {
        // Cria uma categoria usando a factory
        $category = Category::factory()->create();

        // Cria um ticket associado a essa categoria, também usando a factory
        Ticket::factory()->create(['category_id' => $category->id]);

        $response = $this->deleteJson('/api/categories/' . $category->id);

        $response->assertStatus(409)
                 ->assertJson(['message' => 'Não é possível deletar esta categoria, pois existem chamados associados a ela.']);

        $this->assertDatabaseHas('categories', ['id' => $category->id]);
    }
}