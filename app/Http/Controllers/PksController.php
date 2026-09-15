<?php

namespace App\Http\Controllers;

use App\Models\Pks;
use App\Models\Facilitator;
use Illuminate\Http\Request;

class PksController extends Controller
{
    public function index()
    {
        $pks_list = Pks::with('facilitator')->latest()->get();
        $facilitators = Facilitator::orderBy('name')->get();

        return view('admin.pks', compact('pks_list', 'facilitators'));
    }

    public function create()
    {
        // Fetch all facilitators for the dropdown selection
        $facilitators = Facilitator::orderBy('name')->get();
        return view('admin.tambah-pks', compact('facilitators'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name'   => 'required|string|max:255',
            'owner_name'     => 'required|string|max:255',
            'phone_number'   => 'required|string|max:20',
            'email'          => 'required|email|unique:pks,email',
            'sector'         => 'required|string|max:255',
            'facilitator_id' => 'nullable|exists:facilitators,id',
            'status'         => 'required|in:Aktif,TIDAK AKTIF',
        ]);

        $pks = Pks::create([
            'company_name'   => $validated['company_name'],
            'owner_name'     => $validated['owner_name'],
            'phone_number'   => $validated['phone_number'],
            'email'          => $validated['email'],
            'sector'         => $validated['sector'],
            'facilitator_id' => $validated['facilitator_id'] ?? null,
            'status'         => $validated['status'],
        ]);

        // Increment PKS assigned counter on selected facilitator
        if ($pks->facilitator_id) {
            Facilitator::where('id', $pks->facilitator_id)->increment('pks_assigned');
        }

        return redirect()->route('admin.pks')->with('success', 'PKS berjaya ditambah!');
    }

    public function update(Request $request, Pks $pks)
    {
        $validated = $request->validate([
            'company_name'   => 'required|string|max:255',
            'owner_name'     => 'required|string|max:255',
            'phone_number'   => 'required|string|max:20',
            'email'          => 'required|email|unique:pks,email,' . $pks->id,
            'sector'         => 'required|string|max:255',
            'facilitator_id' => 'nullable|exists:facilitators,id',
            'status'         => 'required|in:Aktif,TIDAK AKTIF',
        ]);

        $oldFacilitatorId = $pks->facilitator_id;

        $pks->update($validated);

        // Adjust assigned counters if facilitator changed
        if ($oldFacilitatorId != $pks->facilitator_id) {
            if ($oldFacilitatorId) {
                Facilitator::where('id', $oldFacilitatorId)->where('pks_assigned', '>', 0)->decrement('pks_assigned');
            }
            if ($pks->facilitator_id) {
                Facilitator::where('id', $pks->facilitator_id)->increment('pks_assigned');
            }
        }

        return redirect()->route('admin.pks')->with('success', 'Maklumat PKS berjaya dikemaskini!');
    }

    public function destroy(Pks $pks)
    {
        if ($pks->facilitator_id) {
            Facilitator::where('id', $pks->facilitator_id)->where('pks_assigned', '>', 0)->decrement('pks_assigned');
        }

        $pks->delete();

        return redirect()->route('admin.pks')->with('success', 'PKS berjaya dipadam!');
    }
}