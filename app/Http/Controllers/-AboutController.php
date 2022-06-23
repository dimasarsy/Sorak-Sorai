<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.abouts.index', [
            'abouts' => About::query()->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.abouts.create', [
            'abouts' => About::query()->latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAboutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug'   => 'required|unique:abouts',
            'bait' => 'required|max:255',
            'time' => 'required',
            'short_desc' => 'required',
            'full_desc' => 'required',
            'short_tnc' => 'required',
            'full_tnc' => 'required',
            'image' => 'required|image|file|max:1024',
        ]);

        $validatedData['image'] = $request->file('image')->store('post-images');
        $validatedData['user_id'] = auth()->user()->id;

        About::create($validatedData);

        return redirect()->to('/dashboard/abouts')->with('success', 'Information has been Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('dashboard.abouts.edit', [
            'about' => $about,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutRequest  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $rules = [
            'name' => 'required|max:255',
            'bait' => 'required|max:255',
            'time' => 'required',
            'short_desc' => 'required|max:255',
            'full_desc' => 'required',
            'short_tnc' => 'required|max:255',
            'full_tnc' => 'required',
            'logo_img' => 'required|image|file|max:1024',
        ];

        if ($request->slug !== $about->slug) {
            $rules['slug'] = 'required|unique:abouts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('logo_img')) {
            if ($request->post('old-image')) Storage::delete($request->post('old-image'));
            $validatedData['logo_img'] = $request->file('logo_img')->store('post-images');
        }

        About::where('id', $about->id) -> update($validatedData);

        return redirect()->to('/dashboard/abouts')->with('success', 'About has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        if ($about->logo_img) Storage::delete($about->logo_img);
        $about->delete();
        return redirect()->to('/dashboard/abouts')->with('deleted', 'Information has been deleted.');
    }

    public function slug()
    {
        $slug = Str::of(request('name'))->slug()->value;
        while (true) {
            $about = About::query()->where('slug', '=', $slug)->get();
            if ($about->isNotEmpty()) {
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
