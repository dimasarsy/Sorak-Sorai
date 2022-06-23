<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $category = null;
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
        }
        

        $posts = Post::with(["author", "category"])
            ->latest()
            // ->where('posts.category_id', '2')
            ->filter(request(["search", 'category', 'author']))
            ->get();


        $posts_mitra = Post::with(["author", "category"])
            ->filter(request(["search", 'category', 'author']))
            ->latest()
            ->where('posts.category_id', '2')
            ->limit(5)
            ->get();

        $koleksi = Post::with(["author", "category"])
            ->latest()
            ->filter(request(["search", 'category', 'author']))
            ->where('posts.category_id', '1')
            ->get();

        $posts_koleksi = Post::with(["author", "category"])
            ->filter(request(["search", 'category', 'author']))
            ->latest()
            ->where('posts.category_id', '1')
            ->limit(5)
            ->get();

        return view('posts.posts', [
            "title" => "Marketplace",
            "category"  => $category,
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
}
