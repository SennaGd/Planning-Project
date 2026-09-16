<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $selectedDate = $request->input('date', now()->toDateString());
        $searchQuery = $request->input('search', '');

        $request->validate([
            'date' => ['nullable', 'date'],
        ]);

        $activities = Activity::query()
            ->with('schoolClasses')
            ->whereDate('dt_start', $selectedDate)
            ->when($searchQuery, function ($query) use ($searchQuery) {
                $query->where(function ($subQuery) use ($searchQuery) {
                    $subQuery->where('summary', 'like', "%{$searchQuery}%")
                        ->orWhere('description', 'like', "%{$searchQuery}%")
                        ->orWhere('location', 'like', "%{$searchQuery}%")
                        ->orWhere('attendee', 'like', "%{$searchQuery}%");
                });
            })
            ->orderBy('dt_start')
            ->get();

        if (Route::currentRouteName() === 'home') {
            return view('index', compact('activities', 'selectedDate', 'searchQuery'));
        } elseif (Route::currentRouteName() === 'lesplein') {
            return view('lesplein', compact('activities', 'selectedDate'));
        }

        abort(404);
    }

    public function dashboard(Request $request): View
    {
        $selectedDate = $request->input('date', now()->toDateString());
        $searchQuery = $request->input('search', '');

        $request->validate([
            'date' => ['nullable', 'date'],
        ]);

        $activities = Activity::query()
            ->whereDate('dt_start', $selectedDate)
            ->when($searchQuery, function ($query) use ($searchQuery) {
                $query->where(function ($subQuery) use ($searchQuery) {
                    $subQuery->where('summary', 'like', "%{$searchQuery}%")
                        ->orWhere('description', 'like', "%{$searchQuery}%")
                        ->orWhere('location', 'like', "%{$searchQuery}%")
                        ->orWhere('attendee', 'like', "%{$searchQuery}%");
                });
            })
            ->orderBy('dt_start')
            ->get();

        $school_classes = SchoolClass::all();

        if (Route::currentRouteName() === 'dashboard') {
            return view('dashboard', compact('activities', 'selectedDate', 'searchQuery', 'school_classes'));
        } elseif (Route::currentRouteName() === 'dashboard') {
            return view('dashboard', compact('activities'));
        }
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    //    public function store(Request $request)
    //    {
    // //        dd($request->all());
    //        $validated = $request->validate([
    // //            'uid'         => time(),
    // //            'dt_stamp'    => now()->toDateString(),
    //            'dt_start'    => 'required|date',
    //            'dt_end'      => 'required|date|after_or_equal:dt_start',
    //            'summary'     => 'required|string|max:255',
    // //            'description' => 'required|string|max:255',
    //            'location'    => 'required|string|max:255',
    // //            'status'      => 'required|string|max:255',
    // //            'text'        => 'required|string|max:255',
    // //            'version'     => 2.0,
    //            'attendee'    => 'required|string|max:255',
    //            'className'    => 'required|string|max:255',
    //        ]);
    //        dd($validated);
    //        dd(Activity::create($validated));
    //
    // //        return redirect('/dashboard');
    //
    //
    //    }
    public function store(Request $request)
    {
        $selectedClasses = $request->input('school_classes', []);

        //        dd($selectedClasses);
        //                dd($request->all());
        $validated = $request->validate([
            'dt_start' => 'required|date',
            'dt_end' => 'required|date|after_or_equal:dt_start',
            'summary' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'attendee' => 'required|string|max:255',

        ]);

        $activity = Activity::create($validated + [
            'uid' => time(), // good for now, need to make verification that the time is not yet in use
            'dt_stamp' => now()->toDateString(),
            'status' => 'active',
            'text' => 'IT en Software Development',
            'version' => 2.0,
        ]);

        Schema::withoutForeignKeyConstraints(function () use ($activity, $selectedClasses): void {
            $activity->attachSchoolClasses($selectedClasses);
        });

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $activity = Activity::where('prod_id', $id)->firstOrFail();
        $activity = Activity::where('prod_id', $id)->firstOrFail();

        return view('ics', compact('activity'));

        return view('ics', compact('activity'));
    }

    /**
     * Parsed from format .now()  to ICS format
     * YYYY-MM-DD HH-MM-SS -> YYYYMMDDTHHMMSSZ
     * 2026-09-04 11:09:48 -> 20260904T110948Z
     */
    public function parse_ics_time(string $str_time)
    {
        $year = substr($str_time, 0, 4);
        $month = substr($str_time, 5, 2);
        $day = substr($str_time, 8, 2);
        $hour = substr($str_time, 11, 2);
        $minute = substr($str_time, 14, 2);
        $second = substr($str_time, 17, 2);

        $ics_time = $year.$month.$day.'T'.$hour.$minute.$second.'Z';
        $ics_time = $year.$month.$day.'T'.$hour.$minute.$second.'Z';

        return $ics_time;
    }

    public function generate_ics_feed(Request $request): Response
    {
        $activities_list = $request->query('activities', []);

        // header ICS file
        // header ICS file
        $ics_content = implode("\r\n", [
            'BEGIN:VCALENDAR',
            'VERSION:2.0',
            'PRODID:-//Firda Planning//Planning Dashboard v2.0//NL',
            'CALSCALE:GREGORIAN',
            'METHOD:PUBLISH',
        ]);

        foreach ($activities_list as $id) {
            $activity = Activity::where('prod_id', $id)->firstOrFail();
            if ($activity) {
                $parsed_dt_start = ActivityController::parse_ics_time(
                    $activity->dt_start
                );

                $parsed_dt_end = ActivityController::parse_ics_time(
                    $activity->dt_end
                );

                $event = implode("\r\n", [
                    'BEGIN:VEVENT',
                    'UID:'.uniqid().'@firda-planning.com',
                    'DTSTAMP:'.now()->utc()->format('Ymd\THis\Z'),
                    "DTSTART:$parsed_dt_start",
                    "DTEND:$parsed_dt_end",
                    "SUMMARY:$activity->summary",
                    "LOCATION:$activity->location",
                    'END:VEVENT',
                ]);
                $ics_content = $ics_content."\r\n".$event;
            }
        }
        // $ics_content = implode("\r\n", [
        //    'BEGIN:VCALENDAR',
        //    'VERSION:2.0',
        //    'PRODID:-//Your Company//Your App//EN',
        //    'CALSCALE:GREGORIAN',
        //    'METHOD:PUBLISH',
        //    'BEGIN:VEVENT',
        //    'UID:' . uniqid() . '@yourdomain.com',
        //    'DTSTAMP:' . now()->utc()->format('Ymd\THis\Z'),
        //    'DTSTART:20260910T140000Z',
        //    'DTEND:20260910T150000Z',
        //    'SUMMARY:Team Strategy Meeting',
        //    'DESCRIPTION:Discussion regarding upcoming objectives.',
        //    'LOCATION:Conference Room A',
        //    'END:VEVENT',
        //    'END:VCALENDAR',
        // ]);

        $ics_content = $ics_content."\r\n".'END:VCALENDAR';

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
