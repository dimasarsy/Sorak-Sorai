<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => categories::query()->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => categories::query()->latest()->get()
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
            'name' => 'required|max:100',
            'slug'   => 'required|unique:categories',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        categories::create($validatedData);

        return redirect()->to('/dashboard/categories')->with('success', 'categories has been Create.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // public function show(Post $post)
    // {
    //     // return view('dashboard.posts.show', [
    //     //     'post' => $post
    //     // ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories)
    {
        return view('dashboard.categories.edit', [
            'categories'      => $categories,
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
    public function update(Request $request, categories $categories)
    {
        $rules = [
            'name' => 'required|max:100',
        ];

        if ($request->slug !== $categories->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validatedData = $request->validate($rules);

        categories::where('id', $categories->id) -> update($validatedData);

        return redirect()->to('/dashboard/categories')->with('success', 'categories has been updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories)
    {
        $categories->delete();
        return redirect()->to('/dashboard/categories')->with('deleted', 'categories has been deleted.');
    }

    public function slug()
    {
        $slug = Str::of(request('name'))->slug()->value;
        while (true) {
            $categories = categories::query()->where('slug', '=', $slug)->get();
            if ($categories->isNotEmpty()) {
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
