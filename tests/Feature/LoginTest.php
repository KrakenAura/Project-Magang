<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $loginData;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'role' => 'visitor'
        ]);

        $this->loginData = [
            'email' => 'test@example.com',
            'password' => 'password123'
        ];
    }

    public function test_visitor_login_valid()
    {
        $response = $this->post(route('visitor.login'), $this->loginData);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticated();
        $this->assertAuthenticatedAs($this->user);
    }

    public function test_visitor_login_invalid()
    {
        $invalidData = [
            'email' => 'test@example.com',
            'password' => 'wrongpassword'
        ];

        $response = $this->post(route('visitor.login'), $invalidData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'error' => 'Invalid email or password. Please check your credentials.'
        ]);
        $this->assertGuest();
    }

    public function test_visitor_login_incomplete_creds()
    {
        $incompleteData = [
            'email' => 'test@example.com',
            'password' => ''
        ];

        $response = $this->post(route('visitor.login'), $incompleteData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'error' => 'Password is required'
        ]);
        $this->assertGuest();
    }
}
