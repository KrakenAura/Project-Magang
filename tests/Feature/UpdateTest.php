<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Berita;

class UpdateTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    public function test_can_update_citizen_news_with_valid_data()
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

        $createdBerita = \App\Models\Berita::latest()->first();

        $updateData = [
            'title' => 'Updated Title',
            'description' => 'This is an updated description that meets the minimum length requirement of 50 characters for validation.',
            'teaser' => 'This is an updated teaser',
            'image' => UploadedFile::fake()->image('updated.jpg'),
            'author' => 'Updated Author',
            'category' => 'KotaTerkini'
        ];

        $response = $this->put(route('UpdateBerita', $createdBerita->id), $updateData);

        $response->assertRedirect('/admin/kotaterkini');

        $this->assertDatabaseHas('beritas', [
            'id' => $createdBerita->id,
            'title' => 'Updated Title',
            'author' => 'Updated Author'
        ]);
    }

    public function test_cannot_update_news_with_short_description()
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

        $createdBerita = \App\Models\Berita::latest()->first();
        $updateData = [
            'title' => 'Updated Title',
            'description' => 'Short description.',
            'teaser' => 'This is an updated teaser',
            'image' => UploadedFile::fake()->image('updated.jpg'),
            'author' => 'Updated Author',
            'category' => 'KotaTerkini'
        ];

        $response = $this->put(route('UpdateBerita', $createdBerita->id), $updateData);

        $response->assertStatus(302);
    }
    public function test_cannot_update_news_with_invalid_image_type()
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

        $createdBerita = \App\Models\Berita::latest()->first();

        $updateData = [
            'title' => 'Updated Title',
            'description' => 'This is an updated description that meets the minimum length requirement of 50 characters.',
            'teaser' => 'This is an updated teaser',
            'image' => UploadedFile::fake()->create('invalid.txt', 10),
            'author' => 'Updated Author',
            'category' => 'KotaTerkini'
        ];

        $response = $this->put(route('UpdateBerita', $createdBerita->id), $updateData);

        $response->assertStatus(302);
    }

    public function test_cannot_update_news_with_missing_required_fields()
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

        $createdBerita = \App\Models\Berita::latest()->first();

        $updateData = [
            'title' => 'Updated Title',
            'description' => 'This is an updated description that meets the minimum length requirement of 50 characters.',
            'teaser' => 'This is an updated teaser',
            'image' => UploadedFile::fake()->image('updated.jpg'),
            'author' => '',
            'category' => '',
        ];

        $response = $this->put(route('UpdateBerita', $createdBerita->id), $updateData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['author', 'category']);
    }
}
