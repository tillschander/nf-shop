<?php

namespace Tests\Feature\Http\Controllers\Backend;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    // function index()
    public function testReturnUsersIndexView()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('admin.users.index'));
        $response->assertViewIs('backend.users.index');
        $response->assertStatus(200);
    }

    // function create()
    public function testReturnUsersCreateView()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('admin.users.create'));
        $response->assertViewIs('backend.users.create');
        $response->assertStatus(200);
    }
    public function testValidatedUserIsCreatedInDatabase()
    {
        $user = factory(User::class)->create();
        $data = [
            'name' => $this->faker->name, // 'Test Tester',
            'email' => $this->faker->email, // 'test@example.com',
            'password' => $this->faker->password, // 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->actingAs($user)->post(route('admin.users.store'), $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [
            'name' => $data['name'],
            'email' => $data['email']
            // optional: password = Hash
        ]);
    }

    // function edit()
    public function testReturnUsersEditView()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('admin.users.edit', $user));
        $response->assertViewIs('backend.users.edit');
        $response->assertStatus(200);
    }
}
