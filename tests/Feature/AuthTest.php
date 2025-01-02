<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use WithFaker, DatabaseTransactions;

    protected string $password;
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->password = $this->faker->password;
        $this->user = User::factory()->create(['password' => bcrypt($this->password)]);
    }

    protected function attemptToLogin($pasword)
    {
        return $this->post(
            'login',
            [
                'email' => $this->user->email,
                'password' => $pasword,
            ]
        );
    }

    /**
     * A basic feature test example.
     */
    public function test_get_main_page(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testAuth(): void
    {

        $response = $this->attemptToLogin($this->password);
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
        $response = $this->attemptToLogin($this->password . '7');
        $response->assertStatus(301);

        $response = $this->get('roles');
        $response->assertStatus(301);
    }
}
