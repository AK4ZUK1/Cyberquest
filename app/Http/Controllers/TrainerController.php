<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of trainers with automatically counted modules.
     */
    public function index()
    {
        // automatically queries and calculates the 'modules' relation count
        $trainers = Trainer::withCount('modules')->get();

        return view('admin.jurulatih', compact('trainers'));
    }

    /**
     * Store a newly created trainer in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'               => 'required|string|max:255',
            'email'              => 'required|email|unique:trainers,email',
            'expertise_category' => 'required|string|max:255',
            'rating'             => 'nullable|numeric|min:0|max:5',
        ]);

        Trainer::create($validated);

        return redirect()->route('admin.jurulatih')
                         ->with('success', 'Jurulatih berjaya ditambahkan.');
    }

    /**
     * Update the specified trainer in storage.
     */
    public function update(Request $request, $id)
    {
        $trainer = Trainer::findOrFail($id);

        $validated = $request->validate([
            'name'               => 'required|string|max:255',
            'email'              => 'required|email|unique:trainers,email,' . $id,
            'expertise_category' => 'required|string|max:255',
            'rating'             => 'nullable|numeric|min:0|max:5',
        ]);

        $trainer->update($validated);

        return redirect()->route('admin.jurulatih')
                         ->with('success', 'Maklumat jurulatih berjaya dikemaskini.');
    }

    /**
     * Remove the specified trainer from storage.
     */
    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->delete();

        return redirect()->route('admin.jurulatih')
                         ->with('success', 'Rekod jurulatih berjaya dipadam.');
    }
}