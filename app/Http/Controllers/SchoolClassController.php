<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'classname' => 'required|string|max:255',
        ]);
        $schoolClass = SchoolClass::create($validated + [
            'created_at' => now()->toDateString(),
            'updated_at' => now()->toDateString(),
        ]);

        return redirect('/dashboard');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:school_classes,id',
            'classname' => 'required|string|max:255',
        ]);
        $schoolClass = SchoolClass::findOrFail($request->id);
        $schoolClass->update([
            'classname' => $validated['classname'],
        ]);

        return redirect('/dashboard');
    }

    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:school_classes,id',
        ]);
        $schoolClass = SchoolClass::findOrFail($validated['id']);
        $schoolClass->delete();

        return redirect('/dashboard');
    }
}
