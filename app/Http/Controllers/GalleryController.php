<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.galleries.index', [
            'galleries' => Gallery::query()->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.galleries.create', [
            'galleries' => Gallery::query()->latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:200',
            'slug'   => 'required|unique:galleries',
            'desc'   => 'required',
            'image' => 'required|image|file|max:1024'
        ]);

        $validatedData['image'] = $request->file('image')->store('post-images');
        $validatedData['user_id'] = auth()->user()->id;

        Gallery::create($validatedData);

        return redirect()->to('/dashboard/galleries')->with('success', 'New Gallery has been Uploaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('dashboard.galleries.edit', [
            'gallery' => $gallery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGalleryRequest  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $rules = [
            'name' => 'required|max:200',
            'desc'   => 'required',
            'image' => 'required|image|file|max:1024'
        ];

        if ($request->slug !== $gallery->slug) {
            $rules['slug'] = 'required|unique:galleries';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->post('old-image')) Storage::delete($request->post('old-image'));
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Gallery::where('id', $gallery->id) -> update($validatedData);

        return redirect()->to('/dashboard/galleries')->with('success', 'Gallery has been updated.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) Storage::delete($gallery->image);
        $gallery->delete();
        return redirect()->to('/dashboard/galleries')->with('deleted', 'Gallery has been deleted.');
    }

    public function slug()
    {
        $slug = Str::of(request('name'))->slug()->value;
        while (true) {
            $gallery = Gallery::query()->where('slug', '=', $slug)->get();
            if ($gallery->isNotEmpty()) {
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
