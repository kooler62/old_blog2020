<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        return User::apiV1Authors()->paginate(10);
    }

    public function show(int $id)
    {
        return Category::apiV1Author($id);
    }
}
