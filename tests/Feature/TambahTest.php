<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class TambahTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }
    public function test_can_store_citizen_news_with_valid_data()
    {
        $validData = [
            'title' => 'Test News Title',
            'description' => 'This is a test description that meets the minimum length requirement of 50 characters for validation.',
            'teaser' => 'This is a test teaser',
            'image' => UploadedFile::fake()->image('news.jpg'),
            'author' => 'Test Author',
            'category' => 'KotaTerkini'
        ];

        $response = $this->post(route('CreateBerita'), $validData);

        $response->assertRedirect('/citizen');
    }
    public function test_cannot_store_news_with_short_description()
    {
        $invalidData = [
            'title' => 'Test News Title',
            'description' => 'Too short',
            'teaser' => 'This is a test teaser',
            'image' => UploadedFile::fake()->image('news.jpg'),
            'author' => 'Test Author',
            'category' => 'KotaTerkini'
        ];

        $response = $this->post(route('CreateBerita'), $invalidData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'error' => 'Failed to submit news: News content must be at least 50 characters'
        ]);
    }
    public function test_cannot_store_news_with_invalid_image_type()
    {
        $invalidData = [
            'title' => 'Test News Title',
            'description' => 'This is a test description that meets the minimum length requirement of 50 characters for validation.',
            'teaser' => 'This is a test teaser',
            'image' => UploadedFile::fake()->create('document.pdf', 1000),
            'author' => 'Test Author',
            'category' => 'KotaTerkini'
        ];

        $response = $this->post(route('CreateBerita'), $invalidData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('error');
    }
    public function test_cannot_store_news_with_missing_required_fields()
    {
        $invalidData = [
            'title' => '',
            'description' => '',
            'teaser' => '',
            'author' => '',
            'category' => ''
        ];

        $response = $this->post(route('CreateBerita'), $invalidData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['error']);
    }
}
