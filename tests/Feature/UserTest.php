<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function testGetName()
    // {
    //     // Create a new User instance.
    //     $user = new User();

    //     // Set the user's name.
    //     $user->name = 'John Doe';

    //     // Assert that the user's name is correct.
    //     $this->assertEquals('John Doe', $user->getName());
    // }

    // public function test_a_user_can_be_created()
    // {
    //     $user = User::create([
    //         'name' => 'John Doe',
    //         'email' => 'john.doe@example.com',
    //     ]);

    //     $this->assertTrue($user->exists);
    //     $this->assertEquals('John Doe', $user->name);
    //     $this->assertEquals('john.doe@example.com', $user->email);
    // }
}
