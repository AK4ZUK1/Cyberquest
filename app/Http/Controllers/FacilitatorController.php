<?php

namespace App\Http\Controllers;

use App\Models\Facilitator;
use App\Models\User;
use App\Models\Pks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

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
            'email' => 'required|email|unique:facilitators,email|unique:users,email',
            'status' => 'required|in:Aktif,Bercuti',
        ]);

        DB::transaction(function () use ($validated) {
            // 1. Create the user record with role 'facilitator' and a null password
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'role' => 'facilitator', // Labeling the role
                'password' => null,    // Null password as requested
            ]);

            // 2. Create the facilitator record
            Facilitator::create([
                'user_id' => $user->id, // Links to the users table
                'name' => $validated['name'],
                'phone_number' => $validated['phone_number'],
                'email' => $validated['email'],
                'status' => $validated['status'],
                'pks_assigned' => 0,
            ]);

            // 3. Send the password reset/activation link automatically via Resend
            $token = Password::broker()->createToken($user);
            $user->sendPasswordResetNotification($token);
        });

        return redirect()->route('admin.fasilitator')->with('success', 'Fasilitator berjaya ditambah dan emel jemputan telah dihantar!');
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

    public function dashboard()
    {
        $user = auth()->user();
    
        // Find the facilitator profile using the robust user_id relationship with an email fallback
        $facilitator = Facilitator::where('user_id', $user->id)
            ->orWhere('email', $user->email)
            ->first();

        $assignedPks = collect();
        $pksCount = 0;

        if ($facilitator) {
            // Fetch live assignments directly from the database table using facilitator_id
            $assignedPks = Pks::where('facilitator_id', $facilitator->id)->get();
            $pksCount = $assignedPks->count();
        }

        return view('facilitator.dashboard', compact('user', 'facilitator', 'assignedPks', 'pksCount'));
    }
}