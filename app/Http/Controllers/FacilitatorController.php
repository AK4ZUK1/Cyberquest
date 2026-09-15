<?php

namespace App\Http\Controllers;

use App\Models\Facilitator;
use Illuminate\Http\Request;

class FacilitatorController extends Controller
{
    public function index()
    {
        $facilitators = Facilitator::latest()->get();
        return view('admin.fasilitator', compact('facilitators'));
    }

    public function create()
    {
        return view('admin.tambah-fasilitator');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|unique:facilitators,email',
            'status' => 'required|in:Aktif,Bercuti',
        ]);

        Facilitator::create([
            'name' => $validated['name'],
            'phone_number' => $validated['phone_number'],
            'email' => $validated['email'],
            'status' => $validated['status'],
            'pks_assigned' => 0,
        ]);

        return redirect()->route('admin.fasilitator')->with('success', 'Fasilitator berjaya ditambah!');
    }

    public function update(Request $request, Facilitator $facilitator)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|unique:facilitators,email,' . $facilitator->id,
            'status' => 'required|in:Aktif,Bercuti',
        ]);

        $facilitator->update($validated);

        return redirect()->route('admin.fasilitator')->with('success', 'Maklumat fasilitator berjaya dikemaskini!');
    }

    public function destroy(Facilitator $facilitator)
    {
        $facilitator->delete();

        return redirect()->route('admin.fasilitator')->with('success', 'Fasilitator berjaya dipadam!');
    }
}