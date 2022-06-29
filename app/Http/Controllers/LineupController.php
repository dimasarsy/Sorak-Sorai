<?php

namespace App\Http\Controllers;

use App\Models\Lineup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


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
        // $validatedData = $request->validate([
        //     'name' => 'required|max:100',
        //     'slug'   => 'required|unique:lineups',
        //     'date'   => 'required|max:20',
        //     'time'   => 'required',
        //     'image' => 'required|image|file|max:1024',
        //     'information'   => 'required'

        // ]);

        // $validatedData['image'] = $request->file('image')->store('post-images');
        // $validatedData['user_id'] = auth()->user()->id;

        // Lineup::create($validatedData);

        // return redirect()->to('/dashboard/lineups')->with('success', 'New Performance has been Uploaded.');

        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'slug'   => 'required|unique:lineups',
            "date" => "required",
            "starttime" => "required",
            "endtime" => "required",
            'image' => 'required|image|file|max:1024',
            'information'   => 'required'
        ]);

        $validatedData['image'] = $request->file('image')->store('post-images');

        $lineup = new Lineup();
        $lineup->name = $validatedData['name'];
        $lineup->slug = $validatedData['slug'];
        $lineup->image = $validatedData['image'];
        $lineup->date = $validatedData['date'];
        $lineup->information = $validatedData['information'];
        $lineup->starttime = $validatedData['starttime'];

        $time_start = explode(':', $lineup->starttime);
        $hour_start = $time_start[0];
        $minute_start = $time_start[1];

        $lineup->endtime = $validatedData['endtime'];

        $time_end = explode(':', $lineup->endtime);
        $hour_end = $time_end[0];
        $minute_end = $time_end[1];

        $date_start = new Carbon($lineup->date);
        $date_end = new Carbon($lineup->date);

        $lineup->availableScheduleDate = $date_start->addHours($hour_start)->addMinutes($minute_start);
        $lineup->dueDateSchedule = $date_end->addHours($hour_end)->addMinutes($minute_end);
        $lineup->status = "available";

        $lineup->save();
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
        if ($request->name == $lineup->name) {
            $validatedData = $request->validate([
                'name' => 'required|max:100',
                "date" => "required",
                "starttime" => "required",
                "endtime" => "required",
                'image' => 'image|file|max:1024',
                'information'   => 'required'
            ]);

            $validatedData['name'] = $lineup->name;

            $time_start  = explode(':', $validatedData['starttime']);
            $hour_start  = $time_start[0];
            $minute_start  = $time_start[1];

            $time_end  = explode(':', $validatedData['endtime']);
            $hour_end  = $time_end[0];
            $minute_end  = $time_end[1];

            $date_start = new Carbon($validatedData['date']);
            $date_end = new Carbon($validatedData['date']);
            $validatedData['availableScheduleDate'] =  $date_start->addHours($hour_start)->addMinutes($minute_start);
            $validatedData['dueDateSchedule'] =  $date_end->addHours($hour_end)->addMinutes($minute_end);

        } else {
            $validatedData = $request->validate([
                'name' => 'required|max:100',
                "date" => "required",
                "starttime" => "required",
                "endtime" => "required",
                'image' => 'image|file|max:1024',
                'information'   => 'required'
            ]);

            $time_start  = explode(':', $validatedData['starttime']);
            $hour_start  = $time_start[0];
            $minute_start  = $time_start[1];

            $time_end  = explode(':', $validatedData['endtime']);
            $hour_end  = $time_end[0];
            $minute_end  = $time_end[1];

            $date_start = new Carbon($validatedData['date']);
            $date_end = new Carbon($validatedData['date']);
            $validatedData['availableScheduleDate'] =  $date_start->addHours($hour_start)->addMinutes($minute_start);
            $validatedData['dueDateSchedule'] =  $date_end->addHours($hour_end)->addMinutes($minute_end);

        }

        if ($request->file('image')) {

            if ($request->post('old-image')){
                Storage::delete($request->post('old-image'));
            } 
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        if (
            $request->name == $lineup->name && $request->price == $lineup->price &&
            $request->description == $lineup->description &&
            $request->file('image') == null && $request->date == $lineup->date &&
            $request->starttime == $lineup->starttime && $request->endtime == $lineup->endtime
        ) {
            return redirect('/dashboard/lineups')->with('noUpdate', 'There is no update on Lineup!');
        }

        Lineup::where('id', $lineup->id)->update($validatedData);

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
