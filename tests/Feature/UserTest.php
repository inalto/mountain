<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\CreatesApplication;
use Tests\TestCase;

class UserTest extends TestCase
{
    use CreatesApplication;


    /**
     * Test User model creation.
     *
     * @return void
     */
    public function testUserCreation()
    {
        $data=User::factory()->definition();

        User::create($data);
        $this->assertDatabaseHas('users', ['email' => $data['email']]);
    }

    /**
     * Test User model update.
     *
     * @return void
     */
  /*
     public function testUserUpdate()
    {
        $user = User::factory()->create();

        $updatedData = [
            'name' => 'Updated Name',
            'email' => 'updated_email@example.com',
        ];

        $response = $this->put('/users/' . $user->id, $updatedData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updated_email@example.com',
        ]);
    }
*/
    /**
     * Test User model deletion.
     *
     * @return void
     */
    /*
    public function testUserDeletion()
    {
        $user = User::factory()->create();

        $response = $this->delete('/users/' . $user->id);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
    */
}
