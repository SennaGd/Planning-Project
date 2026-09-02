<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $activities = Activity::query()->get();

        return view('index', compact('activities'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'uid'         => 'required|string|max:255',
            'dt_stamp'    => 'required|date',
            'dt_strat'    => 'required|date',
            'dt_end'      => 'required|date|after_or_equal:dt_strat',
            'summary'     => 'required|string|max:65535',
            'description' => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'status'      => 'required|string|max:255',
            'text'        => 'required|string|max:255',
            'version'     => 'required|string|max:255',
            'attendee'    => 'required|string|max:255',
        ]);
        Activity::create($request->all());


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $activity = Activity::FindOrFail($id);

        return view('ics', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
