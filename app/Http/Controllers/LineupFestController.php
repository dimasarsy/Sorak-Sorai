<?php

namespace App\Http\Controllers;

use App\Models\Lineup;
use Illuminate\Http\Request;

class LineupFestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lineup', [
            'title' => "Lineup",
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lineup  $lineup
     * @return \Illuminate\Http\Response
     */
    public function show(Lineup $lineup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lineup  $lineup
     * @return \Illuminate\Http\Response
     */
    public function edit(Lineup $lineup)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lineup  $lineup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lineup $lineup)
    {
        //
    }
}
