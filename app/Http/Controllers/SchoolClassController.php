<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;

class SchoolClassController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'classname' => 'required|string|max:255',
        ]);
        $schoolClass = schoolClass::create($validated +[
            'created_at' => now()->toDateString(),
            'updated_at' => now()->toDateString(),
            ]);

        return redirect('/dashboard');
    }
    public function update(Request $request){
        $validated = $request->validate([
            'classname' => 'required|string|max:255',
        ]);
        $update = schoolClass::find($request->id);
        $update->update($validated +[
            'updated_at' => now()->toDateString(),
            ]);
        dd($update);
    }
}
