<?php

namespace Tests\Feature\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class RegisterApiTest extends TestCase
{


    #[Test] public function a_user_can_register_successfully()
    {
        $userData = [
            'name' => 'John Doe2',
            'email' => 'john@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->postJson('/api/register', $userData);

        $response->assertStatus(201) // Expect 201 Created
        ->assertJsonStructure([
            'message',
            'user' => ['id', 'name', 'email', 'created_at'],
            'token',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
            'name' => 'John Doe2',
        ]);
    }
}
