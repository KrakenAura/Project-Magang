<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class VisitorControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_visitor_can_login_successfully()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'role' => 'visitor'
        ]);

        $loginData = [
            'email' => 'test@example.com',
            'password' => 'password123',
        ];

        $response = $this->post(route('visitor.login'), $loginData);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticated();
        $this->assertAuthenticatedAs($user);
    }
}
