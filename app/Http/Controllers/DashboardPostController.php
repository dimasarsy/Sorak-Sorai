<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(["author", "categories"])
        ->latest()
        ->where('posts.user_id',auth()->user()->id)
        ->filter(request(["search", 'categories', 'author']))
        ->paginate(8);

        // $posts = auth()->user()->posts()->latest()->get(); // Error of intelephense
        return view('dashboard.posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories'    => categories::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'slug'   => 'required|unique:posts',
            'shopeelink'   => 'required|max:255',
            'categories_id'   => 'required|numeric',
            'description'   => 'required',
            'image' => 'required|image|file|max:1024',
            'image2' => 'image|file|max:1024',
            'image3' => 'image|file|max:1024',
            'body'   => 'required|max:1000'
        ]);

        $validatedData['image'] = $request->file('image')->store('post-images');
        $validatedData['image2'] = $request->file('image2')->store('post-images');
        $validatedData['image3'] = $request->file('image3')->store('post-images');
        $validatedData['user_id'] = auth()->user()->id;

        Post::create($validatedData);

        return redirect()->to('/dashboard/posts')->with('success', 'New Product has been Uploaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post'          => $post,
            'categories'    => categories::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'shopeelink'   => 'required|max:255',
            'categories_id'   => 'required|numeric',
            'description'   => 'required',
            'image' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024',
            'image3' => 'image|file|max:1024',
            'body'   => 'required'
        ];


        if ($request->slug !== $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->post('old-image')) Storage::delete($request->post('old-image'));
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        if ($request->file('image2')) {
            if ($request->post('old-image')) Storage::delete($request->post('old-image'));
            $validatedData['image2'] = $request->file('image2')->store('post-images');
        }
        if ($request->file('image3')) {
            if ($request->post('old-image')) Storage::delete($request->post('old-image'));
            $validatedData['image3'] = $request->file('image3')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        if (
            $request->title == $post->title && $request->shopeelink == $post->shopeelink && 
            $request->categories_id == $post->categories_id && $request->description == $post->description &&
            $request->body == $post->body && $request->file('image') == null && $request->file('image2') == null && 
            $request->file('image3') == null
        ) {
            return redirect('/dashboard/posts')->with('noUpdate', 'There is no update on Product!');
        }

        $post->where('id', $post->id)->update($validatedData);
        return redirect()->to('/dashboard/posts')->with('success', 'Product has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Post $post)
    {
        if ($post->image) Storage::delete($post->image);
        $post->delete();
        return redirect()->to('/dashboard/posts')->with('deleted', 'Post has been deleted.');
    }

    public function slug()
    {
        $slug = Str::of(request('title'))->slug()->value;
        while (true) {
            $post = Post::query()->where('slug', '=', $slug)->get();
            if ($post->isNotEmpty()) {
                $slug .= '-' . Str::lower(Str::random(5));
                continue;
            } else {
                break;
            }
        }
        return response()->json([
            "slug"  => $slug
        ]);
    }
}
