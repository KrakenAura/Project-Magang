<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crew;
use App\Http\Resources\CrewResource;

class CrewController extends Controller
{
    public function index()
    {
        $crew = Crew::all();
        return view('download', compact('librarys'));
    }

    public function view_dashboard()
    {
        $crew = Crew::all();
        return view('dashboard.admin_library', compact('librarys'));
    }

    public function show($id)
    {
        $crew = Crew::find($id);
        return new CrewResource($crew);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('Crew_images', 'public');
            $validatedData['foto'] = $imagePath;
        }

        $crew = Crew::create($validatedData);
        return redirect('/admin/profil')->with('success', 'Berita created successfully');
    }

    public function update(Request $request, $id)
    {
        $crew = Crew::findOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('Crew_images', 'public');
            $validatedData['foto'] = $imagePath;
        }

        $crew->update($validatedData);
        return redirect('/admin/profil')->with('success', 'Berita updated successfully');
    }

    public function destroy($id)
    {
        $crew = Crew::findOrFail($id);
        $crew->delete();
        return redirect('/admin/profil')->with('success', 'Berita deleted successfully');
    }
}
