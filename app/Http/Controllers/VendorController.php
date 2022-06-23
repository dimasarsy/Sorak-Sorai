<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Datavendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    public function index()
    {
        $category = null;
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
        }
        $posts = Post::with(["author", "category"])
            ->latest()
            ->filter(request(["search", 'category', 'author']))
            ->paginate(9)->withQueryString();
        return view('vendor-list', [
            'users' => User::query()->latest()->get(),
            "title" => "Marketplace",
            'datavendors' => Datavendor::query()->latest()->get(),
            "category"  => $category,
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
