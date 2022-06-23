<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\categories;
use App\Models\Datavendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    public function index()
    {
        $categories = null;
        if (request('categories')) {
            $categories = categories::firstWhere('slug', request('categories'));
        }
        $posts = Post::with(["author", "categories"])
            ->latest()
            ->filter(request(["search", 'categories', 'author']))
            ->paginate(9)->withQueryString();
        return view('vendor-list', [
            'users' => User::query()->latest()->get(),
            "title" => "Marketplace",
            'datavendors' => Datavendor::query()->latest()->get(),
            "categories"  => $categories,
            "posts" => $posts
        ]);
    }
    

    // public function show(Post $post)
    // {
    //     return view('posts.post', [
    //         "title" => "Post",
    //         "post"  => $post
    //     ]);
    // }
}
