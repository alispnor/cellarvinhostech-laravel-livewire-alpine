<?php

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('can list categories via API', function () {
    Category::factory()->create(['name' => 'Infraestrutura']);
    Category::factory()->create(['name' => 'Financeiro']);

    $response = $this->getJson('/api/categories');

    $response->assertOk();
    $response->assertJsonFragment(['name' => 'Infraestrutura']);
    $response->assertJsonFragment(['name' => 'Financeiro']);
});

it('can create a category via API', function () {
    $payload = ['name' => 'Atendimento'];

    $response = $this->postJson('/api/categories', $payload);

    $response->assertCreated();
    $response->assertJsonFragment(['name' => 'Atendimento']);
    $this->assertDatabaseHas('categories', ['name' => 'Atendimento']);
});
