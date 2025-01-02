<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckRolesTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    public static function dataProviderRoles()
    {
        return [
            ['Admin', 200],
            ['Client', 403],
            ['Manager', 403],
            ['Main-Manager', 403],
        ];
    }

    /**
     * @param $roleName
     * @param $expectedCodeResult
     * @return void
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('dataProviderRoles')]
    public function testCheckRouteRoles($roleName, $expectedCodeResult)
    {
        $role = Role::where('name', $roleName)->first();
        $password = $this->faker->password;
        $user = User::factory()->create([
            'role_id' => $role->id,
            'password' => bcrypt($password)
        ]);

        $this->post(
            'login',
            [
                'email' => $user->email,
                'password' => $password,
            ]
        );

        $response = $this->get('roles');
        $response->assertStatus($expectedCodeResult);
    }
}
