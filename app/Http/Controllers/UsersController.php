<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        return User::get()->map(function(User $user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'role' => $user->role->name,
            ];
        });
    }

    public function user($id)
    {
        return User::find($id);
    }
}
