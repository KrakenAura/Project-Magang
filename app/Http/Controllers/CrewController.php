<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crew;
use App\Http\Resources\CrewResource;

//Controller used for Crew in Profile
class CrewController extends Controller
{
    //Function to check API for return crew by ID
    public function show($id)
    {
        $crew = Crew::find($id);
        return new CrewResource($crew);
    }

    //Function to Storing Crew
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //Upload Crew Photo
        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('Crew_images', 'public');
            $validatedData['foto'] = $imagePath;
        }

        $crew = Crew::create($validatedData);
        return redirect('/admin/profil')->with('success', 'Berita created successfully');
    }

    //Function to Update Crew
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

    //Function to Delete Crew
    public function destroy($id)
    {
        $crew = Crew::findOrFail($id);
        $crew->delete();
        return redirect('/admin/profil')->with('success', 'Berita deleted successfully');
    }
}
