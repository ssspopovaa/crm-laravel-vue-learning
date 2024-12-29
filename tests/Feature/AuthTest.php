<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testAuth(): void
    {
        $password = 123456;
        $user = User::factory()->create(['password' => bcrypt($password)]);

        $response = $this->post('login', ['email' => $user->email, 'password' => $password]);
        $response->assertStatus(200);

        $response = $this->get('roles');
        $response->assertStatus(200);

        $response = $this->get('logout');
        $response->assertStatus(200);

        $response = $this->get('roles');
        $response->assertStatus(301);
    }

    /**
     * @return void
     */
    public function testAuthFailed(): void
    {
        $password = 123456;
        $user = User::factory()->create(['password' => bcrypt($password)]);

        $response = $this->post('login', ['email' => $user->email, 'password' => $password . '7']);
        $response->assertStatus(301);

        $response = $this->get('roles');
        $response->assertStatus(301);
    }
}
