<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\categories;
use App\Models\Pengajuan;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $categories = null;
        if (request('categories')) {
            $categories = categories::firstWhere('slug', request('categories'));
        }
        

        $posts = Post::with(["author", "categories"])
            ->latest()
            // ->where('posts.categories_id', '2')
            ->filter(request(["search", 'categories', 'author']))
            ->get();


        $posts_mitra = Post::with(["author", "categories"])
            ->filter(request(["search", 'categories', 'author']))
            ->latest()
            ->where('posts.categories_id', '2')
            ->limit(5)
            ->get();

        $koleksi = Post::with(["author", "categories"])
            ->latest()
            ->filter(request(["search", 'categories', 'author']))
            ->where('posts.categories_id', '1')
            ->get();

        $posts_koleksi = Post::with(["author", "categories"])
            ->filter(request(["search", 'categories', 'author']))
            ->latest()
            ->where('posts.categories_id', '1')
            ->limit(5)
            ->get();

        return view('posts.posts', [
            "title" => "Marketplace",
            "categories"  => $categories,
            "pengajuans"  => Pengajuan::where('status', "Lolos")
                            ->join('users', 'pengajuans.user_id', '=', 'users.id')
                            ->select('pengajuans.*', 'users.username')
                            ->get(),
            "posts" => $posts,
            "posts_mitra" => $posts_mitra,
            "posts_koleksi" => $posts_koleksi,
            "koleksi" => $koleksi,
            'users' => User::query()->latest()->get()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.post', [
            "title" => "Marketplace",
            "post"  => $post
        ]);
    }

    public function postsByUser(User $author)
    {
        return view('posts.posts-by-user', [
            "posts" => $author->posts->load('author', 'categories'),
            "user"  => $author,
            "title" => "Marketplace",
        ]);
    }
}
