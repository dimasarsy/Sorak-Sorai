<?php

namespace App\Http\Controllers;

use App\Models\Lineup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class LineupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.lineups.index', [
            'lineups' => Lineup::query()->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.lineups.create', [
            'lineups' => Lineup::query()->latest()->get()
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
            'slug'   => 'required|unique:lineups',
            'date'   => 'required|max:20',
            'time'   => 'required',
            'image' => 'required|image|file|max:1024',
            'information'   => 'required'

        ]);

        $validatedData['image'] = $request->file('image')->store('post-images');
        $validatedData['user_id'] = auth()->user()->id;

        Lineup::create($validatedData);

        return redirect()->to('/dashboard/lineups')->with('success', 'New Performance has been Uploaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lineup  $lineup
     * @return \Illuminate\Http\Response
     */
    public function show(Lineup $lineup)
    {
        return view('dashboard.lineups.show', [
            'lineup' => $lineup
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lineup  $lineup
     * @return \Illuminate\Http\Response
     */
    public function edit(Lineup $lineup)
    {
        return view('dashboard.lineups.edit', [
            'lineup' => $lineup,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lineup  $lineup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lineup $lineup)
    {
        $rules = [
            'name' => 'required|max:100',
            'date'   => 'required|max:20',
            'time'   => 'required',
            'image' => 'required|image|file|max:1024',
            'information'   => 'required'
        ];

        if ($request->slug !== $lineup->slug) {
            $rules['slug'] = 'required|unique:lineups';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->post('old-image')) Storage::delete($request->post('old-image'));
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Lineup::where('id', $lineup->id) -> update($validatedData);

        return redirect()->to('/dashboard/lineups')->with('success', 'Performance has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lineup  $lineup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lineup $lineup)
    {
        if ($lineup->image) Storage::delete($lineup->image);
        $lineup->delete();
        return redirect()->to('/dashboard/lineups')->with('deleted', 'Performance has been deleted.');
    }
    public function slug()
    {
        $slug = Str::of(request('name'))->slug()->value;
        while (true) {
            $lineup = Lineup::query()->where('slug', '=', $slug)->get();
            if ($lineup->isNotEmpty()) {
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
