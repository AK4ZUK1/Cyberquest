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

        $pdfUrl = null;
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            
            // Upload to Supabase Storage 'modules' bucket
            $path = $file->storeAs('uploads/pdfs', $filename, 'supabase');

            // Generate the correct native Supabase public URL
            $pdfUrl = "https://wothtkwgjnqjrmrweqzh.supabase.co/storage/v1/object/public/modules/" . $path;
        }

        Module::create([
            'title'       => $request->title,
            'category'    => $request->category,
            'trainer_id'  => $request->trainer_id,
            'description' => $request->description,
            'pdf_path'    => $pdfUrl, // Stores the full public Supabase URL
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

        $pdfUrl = $module->pdf_path;

        if ($request->hasFile('pdf_file')) {
            // Optional: Delete old file from Supabase if stored path can be parsed, 
            // otherwise just upload the new one to avoid breaking changes.
            $file = $request->file('pdf_file');
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            
            $path = $file->storeAs('uploads/pdfs', $fileName, 'supabase');
            $pdfUrl = Storage::disk('supabase')->url($path);
        }

        $module->update([
            'title'       => $request->title,
            'category'    => $request->category,
            'trainer_id'  => $request->trainer_id,
            'description' => $request->description,
            'pdf_path'    => $pdfUrl,
        ]);

        return redirect()->route('admin.modul')->with('success', 'Modul berjaya dikemas kini.');
    }

    public function destroy(Module $module)
    {
        // Delete record from database (you can also add remote deletion logic here if needed)
        $module->delete();

        return redirect()->route('admin.modul')->with('success', 'Modul berjaya dipadam.');
    }
}