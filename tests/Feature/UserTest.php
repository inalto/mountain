<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\CreatesApplication;
use Tests\TestCase;

class UserTest extends TestCase
{
    use CreatesApplication;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_creation()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'secret',
        ];

        $user = User::create($data);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($data['name'], $user->name);
        $this->assertEquals($data['email'], $user->email);
        $this->assertTrue(password_verify($data['password'], $user->password));
    }
}
