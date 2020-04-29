<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateUser()
    {
        $data = [
            'name' => 'Test Tester',
            'email' => 'test@example.com',
            'password' => 'password'
        ];

        $user = User::create($data);

        $this->assertNotNull($user);
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($data['name'], $user->name);
        $this->assertEquals($data['email'], $user->email);
        $this->assertEquals($data['password'], $user->password);
    }

    public function testDeleteUser()
    {
        $user = factory(User::class)->create();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $user->name
        ]);

        $user->delete();

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
            'name' => $user->name
        ]);
        $this->assertDeleted($user);
    }
}
