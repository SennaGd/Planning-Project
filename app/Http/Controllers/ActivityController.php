<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
            ->orderBy('dt_start') ->get();


        $school_classes = SchoolClass::all();


        if (Route::currentRouteName() === 'home') {
            return view('index', compact('activities', 'selectedDate', 'searchQuery', 'school_classes'));
        }
        elseif (Route::currentRouteName() === 'lesplein') {
            return view('lesplein', compact('activities', 'school_classes'));
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

    public function generate_qr_code(Request $request)
    {

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
    public function update(Request $request)
    {
        //        dd($request->all());
        $validated = $request->validate([
            'id' => 'required|exists:activities,id',
            'summary' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'attendee' => 'required|string|max:255',
            'dt_start' => 'required|date',
            'dt_end' => 'required|date|after_or_equal:dt_stamp',
            'status' => 'required|string|max:255',
//            'class' => 'required|string|max:255',
        ]);
        $activity = Activity::findOrFail($request->id);
        $activity->update([
            'summary' => $validated['summary'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'attendee' => $validated['attendee'],
            'dt_start' => $validated['dt_start'],
            'dt_end' => $validated['dt_end'],
            'status' => $validated['status'],
            'dt_updated' => now()->toDateTimeString(),
        ]);

        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
