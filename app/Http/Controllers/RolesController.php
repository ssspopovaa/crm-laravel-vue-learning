<?php

namespace App\Http\Controllers;

use App\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        return Role::all();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list()
    {
        return Role::all();
    }
}
