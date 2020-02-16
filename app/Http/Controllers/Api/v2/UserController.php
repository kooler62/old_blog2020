<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $authors = cache()->remember('api_v1_authors', now()->addMinutes(60), function(){
            return User::apiV1Authors()->paginate(10);
        });
        return $authors;
    }

    public function show(int $id)
    {
        $author = cache()->remember('api_v1_author-' . $id, now()->addMinutes(60), function() use ($id){
            return User::apiV1Author($id);
        });
        return $author;
    }
}
