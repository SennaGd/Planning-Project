<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $activity = Activity::where("prod_id", $id)->firstOrFail();

        return view('ics', compact("activity"));
    }
    public function generate_ics_feed(): Response
    {

        /**
         $ics [
            VERSION:
            DTSTART:
            DTEND:
            SUMMARY:
            DESCRIPTION:
            LOCATION
         ]
        */
        $ics_content = implode("\r\n", [
            "BEGIN:VCALENDAR",
            "VERSION:1.0",
            "PRODID:-//Firda Planning//Planning Dashboard v2.0//NL",
            "CALSCALE:GREGORIAN",
            "METHOD:PUBLISH",
        ]);

        $id_list_TEST = [1, 2];
        foreach ($id_list_TEST as $id){
            $activity = Activity::where("prod_id", $id)->firstOrFail();
            if ($activity) {
                $event = implode("\r\n", [
                    "BEGIN:VEVENT",
                    "UID:".uniqid()."@firda-planning.com",
                    "DTSTAMP:".now()->utc()->format('Ymd\THis\Z'),
                    "DTSTART:$activity->dt_start",
                    "DTEND:$activity->dt_end",
                    "SUMMARY:$activity->summary",
                    "LOCATION:$activity->location",
                    "END:VEVENT",
                ]);
                $ics_content = $ics_content."\r\n".$event;
            }
        };
        #$ics_content = implode("\r\n", [
        #    'BEGIN:VCALENDAR',
        #    'VERSION:2.0',
        #    'PRODID:-//Your Company//Your App//EN',
        #    'CALSCALE:GREGORIAN',
        #    'METHOD:PUBLISH',
        #    'BEGIN:VEVENT',
        #    'UID:' . uniqid() . '@yourdomain.com',
        #    'DTSTAMP:' . now()->utc()->format('Ymd\THis\Z'),
        #    'DTSTART:20260910T140000Z',
        #    'DTEND:20260910T150000Z',
        #    'SUMMARY:Team Strategy Meeting',
        #    'DESCRIPTION:Discussion regarding upcoming objectives.',
        #    'LOCATION:Conference Room A',
        #    'END:VEVENT',
        #    'END:VCALENDAR',
        #]);


        $ics_content = $ics_content."\r\n"."END:VCALENDAR";

        return response($ics_content, 200, [
            'Content-Type' => 'text/calendar; charset=utf-8',
            'Content-Disposition' => 'inline; filename="event.ics"',
        ]);
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
