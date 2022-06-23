<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function postsByUser(User $author)
    {
        return view('posts.posts-by-user', [
            "posts" => $author->posts->load('author', 'category'),
            "user"  => $author,
            "title" => "Marketplace",
        ]);
    }
    
}
