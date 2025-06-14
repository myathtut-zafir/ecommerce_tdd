<?php

namespace Tests\Feature\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class LoginApiTest extends TestCase
{
    #[Test] public function a_user_can_login_successfully()
    {
        $userData = [
            'email' => 'john@example.com',
            'password' => 'password123',
        ];
        $response = $this->postJson('/api/login', $userData);
        $response->assertStatus(200) // Expect 201 Created
        ->assertJsonStructure([
            'message',
            'user' => ['id', 'name', 'email'],
            'token',
        ]);

    }
}
