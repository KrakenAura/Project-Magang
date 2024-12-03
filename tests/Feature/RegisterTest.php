<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_visitor_can_register_with_valid_data()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123'
        ];

        $response = $this->post(route('visitor.register'), $userData);

        $response->assertRedirect(route('home'));
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'name' => 'Test User',
            'role' => 'visitor'
        ]);
        $this->assertAuthenticated();
    }

    public function test_visitor_cannot_register_with_existing_email()
    {
        User::factory()->create([
            'email' => 'test@example.com'
        ]);

        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123'
        ];

        $response = $this->post(route('visitor.register'), $userData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'error' => 'This email is already registered'
        ]);
    }

    public function test_visitor_cannot_register_with_invalid_email_format()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'invalid-email',
            'password' => 'password123'
        ];

        $response = $this->post(route('visitor.register'), $userData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'error' => 'Please enter a valid email address'
        ]);
    }

    public function test_visitor_cannot_register_with_short_password()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'short'
        ];

        $response = $this->post(route('visitor.register'), $userData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'error' => 'Password must be at least 8 characters'
        ]);
    }

    public function test_visitor_cannot_register_with_missing_data()
    {
        $userData = [
            'name' => '',
            'email' => 'test@example.com',
            'password' => 'password123'
        ];

        $response = $this->post(route('visitor.register'), $userData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'error' => 'Name is required'
        ]);
    }
}
