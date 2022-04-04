<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_the_books_index_page_is_rendered_properly()
    {
        // We want to create a user
        $user = User::factory()->create();
        // We login this fake user
        $this->actingAs($user);
        // We want to create a fake book for this fake user
        Book::factory(3)->create();
        // We want to hit the /books page
        $response = $this->get('/books');
        // We want to assert that we got a status 200
        $response->assertStatus(200);
    }
}
