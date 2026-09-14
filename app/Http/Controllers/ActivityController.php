<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
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
            'dt_start'    => 'required|date',
            'dt_end'      => 'required|date|after_or_equal:dt_start',
            'summary'     => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'status'      => 'required|string|max:255',
            'text'        => 'required|string|max:255',
            'version'     => 'required|numeric',
            'attendee'    => 'required|string|max:255',
        ]);

        Activity::create($validated);


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
