<?php

namespace App\Http\Controllers;

use App\Models\Pks;
use App\Models\Facilitator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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
            'email'          => 'required|email|unique:pks,email|unique:users,email', // ensures email is unique in both tables
            'sector'         => 'required|string|max:255',
            'facilitator_id' => 'nullable|exists:facilitators,id',
            'status'         => 'required|in:Aktif,TIDAK AKTIF',
        ]);

        // 1. Create the PKS profile record
        $pks = Pks::create([
            'company_name'   => $validated['company_name'],
            'owner_name'     => $validated['owner_name'],
            'phone_number'   => $validated['phone_number'],
            'email'          => $validated['email'],
            'sector'         => $validated['sector'],
            'facilitator_id' => $validated['facilitator_id'] ?? null,
            'status'         => $validated['status'],
        ]);

        // 2. Automatically create a corresponding login user with a null password
        $user = User::create([
            'name'     => $validated['owner_name'],
            'email'    => $validated['email'],
            'password' => null, // Password is null so they use the activation link flow
            'role'     => 'pks',
        ]);

        // 3. Generate the activation/password-reset token and send the setup email
        $token = Password::broker()->createToken($user);
        $user->sendPasswordResetNotification($token);

        // Increment PKS assigned counter on selected facilitator
        if ($pks->facilitator_id) {
            Facilitator::where('id', $pks->facilitator_id)->increment('pks_assigned');
        }

        return redirect()->route('admin.pks')->with('success', 'PKS berjaya ditambah dan emel pengaktifan telah dihantar!');
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

        // Also update the corresponding user's email if it changed
        $user = User::where('email', $pks->getOriginal('email'))->first();
        if ($user) {
            $user->update([
                'name'  => $validated['owner_name'],
                'email' => $validated['email'],
            ]);
        }

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
        // Delete the linked user record too if desired
        User::where('email', $pks->email)->delete();

        if ($pks->facilitator_id) {
            Facilitator::where('id', $pks->facilitator_id)->where('pks_assigned', '>', 0)->decrement('pks_assigned');
        }

        $pks->delete();

        return redirect()->route('admin.pks')->with('success', 'PKS berjaya dipadam!');
    }
}