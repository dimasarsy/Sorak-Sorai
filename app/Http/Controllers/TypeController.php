<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.types.index', [
            'types' => Type::query()->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.types.create', [
            'types' => Type::query()->latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'slug'   => 'required|unique:types',
            'price' => 'required',
            'desc' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Type::create($validatedData);

        return redirect()->to('/dashboard/types')->with('success', 'Type has been Create.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('dashboard.types.edit', [
            'type'      => $type,
            'types'    => Type::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $rules = [
            'name' => 'required|max:100',
            'price' => 'required',
            'desc' => 'required',
        ];

        if ($request->slug !== $type->slug) {
            $rules['slug'] = 'required|unique:types';
        }

        $validatedData = $request->validate($rules);

        Type::where('id', $type->id) -> update($validatedData);

        return redirect()->to('/dashboard/types')->with('success', 'Type has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->to('/dashboard/types')->with('deleted', 'Type has been deleted.');
    }

    public function slug()
    {
        $slug = Str::of(request('name'))->slug()->value;
        while (true) {
            $type = Type::query()->where('slug', '=', $slug)->get();
            if ($type->isNotEmpty()) {
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
