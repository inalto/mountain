<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class HaveBeenThereTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_have_been_there()
    {
        $user=User::factory()->create();
        ray($user);
        $this->actingAs($user);
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
