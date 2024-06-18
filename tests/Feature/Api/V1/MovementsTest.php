<?php

namespace Tests\Feature\Api\V1;

use Tests\TestCase;

class MovementsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_return_movements_list(): void
    {
        $response = $this->getJson('/api/v1/movements');

        $response->assertStatus(200);

        $response->assertHeader('Content-Type', 'application/json');

        $response->assertJsonStructure([
            '*' => ['movement_id', 'name'],
        ]);
    }
}
