<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::with('trainer')->latest()->get();
        $trainers = Trainer::all();

        return view('admin.modul.index', compact('modules', 'trainers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string',
            'trainer_id'  => 'nullable|exists:trainers,id',
            'description' => 'nullable|string',
            'pdf_file'    => 'nullable|mimes:pdf|max:10240',
        ]);

        $pdfPath = null;
        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('modules/pdf', 'public');
        }

        Module::create([
            'title'       => $request->title,
            'category'    => $request->category,
            'trainer_id'  => $request->trainer_id,
            'description' => $request->description,
            'pdf_path'    => $pdfPath,
        ]);

        return redirect()->route('admin.modul')->with('success', 'Modul berjaya ditambah.');
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string',
            'trainer_id'  => 'nullable|exists:trainers,id',
            'description' => 'nullable|string',
            'pdf_file'    => 'nullable|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('pdf_file')) {
            if ($module->pdf_path && Storage::disk('public')->exists($module->pdf_path)) {
                Storage::disk('public')->delete($module->pdf_path);
            }
            $module->pdf_path = $request->file('pdf_file')->store('modules/pdf', 'public');
        }

        $module->update([
            'title'       => $request->title,
            'category'    => $request->category,
            'trainer_id'  => $request->trainer_id,
            'description' => $request->description,
            'pdf_path'    => $module->pdf_path,
        ]);

        return redirect()->route('admin.modul')->with('success', 'Modul berjaya dikemas kini.');
    }

    public function destroy(Module $module)
    {
        if ($module->pdf_path && Storage::disk('public')->exists($module->pdf_path)) {
            Storage::disk('public')->delete($module->pdf_path);
        }

        $module->delete();

        return redirect()->route('admin.modul')->with('success', 'Modul berjaya dipadam.');
    }
}