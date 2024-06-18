<?php

namespace Tests\Feature\Api\V1;

use Tests\TestCase;

class PersonalRecordTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_return_personal_record_list(): void
    {
        $movement_id = 1;

        $response = $this->getJson("/api/v1/personal-record/{$movement_id}");

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonStructure([
                'movement',
                'ranking' => [
                    0 => [
                        'user_name',
                        'max_value',
                        'position',
                        'date',
                    ],
                ],
            ]);
    }

    public function test_api_return_personal_record_error_if_movement_not_exists(): void
    {

        $non_existent_movement_id = 999;

        $response = $this->getJson("/api/v1/personal-record/{$non_existent_movement_id}");

        $response->assertStatus(404);

        // Verificar se a resposta contém a mensagem de erro esperada
        $response->assertJson([
            'error' => 'Movement not found.',
        ]);
    }
}
