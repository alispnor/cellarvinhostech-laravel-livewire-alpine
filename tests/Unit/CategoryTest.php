<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_category()
    {
        $category = Category::factory()->create([
            'name' => 'Financeiro'
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'Financeiro',
        ]);
    }
}
