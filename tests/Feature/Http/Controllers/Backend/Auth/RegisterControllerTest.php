<?php

namespace Tests\Feature\Http\Controllers\Backend\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testRegisterRouteDisplaysRegisterView()
    {
        $response = $this->get(route('register'));
        
        $response->assertViewIs('auth.register');
        $response->assertStatus(200);
    }

    public function testLoggedInUsersCantRegisterAndAreSentBackHome()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('register'));

        $response->assertRedirect(route('admin.home'));
    }

    public function testRegisterFormCanDisplayErrors()
    {
        $response = $this->post(route('register'), []);

        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('password');
        $response->assertSessionHasErrors('email');
    }

    public function testRegistrationCreatesAUser()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password(8)
        ];

        $response = $this->post(route('register'), [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'password_confirmation' => $data['password']
        ]);

        $response->assertRedirect(route('admin.home'));

        $user = User::where('email', $data['email'])->first();
        $this->assertEquals($data['name'], $user->name);
        $this->assertEquals($data['email'], $user->email);
        $this->assertNotNull($user);
        $this->assertAuthenticatedAs($user);
    }
}
