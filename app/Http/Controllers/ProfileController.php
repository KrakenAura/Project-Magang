<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Http\Resources\ProfileResource;
use App\Models\Crew;

use Illuminate\Support\Facades\Log;


//Controller used for Profile
class ProfileController extends Controller
{
    //Function to check API for return first Profile
    public function index()
    {
        $profile = Profile::first();
        if ($profile) {
            return new ProfileResource($profile);
        } else {
            return response()->json(['message' => 'No profile found'], 404);
        }
    }
    //Function to check API for return Profile by ID
    public function show($id)
    {
        $profile = Profile::find($id);
        return new ProfileResource($profile);
    }
    //Function to Store Profile
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sejarah' => 'required',
            'deskripsi' => 'required',
            'struktur_organisasi' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Profile_images', 'public');
            $validatedData['image'] = $imagePath;
        }
        if ($request->hasFile('struktur_organisasi')) {
            $imagePathStruktur = $request->file('struktur_organisasi')->store('Profile_images', 'public');
            $validatedData['struktur_organisasi'] = $imagePathStruktur;
        }
        
        $profile = Profile::create($validatedData);
        return redirect('/admin/profile')->with('success', 'Berita created successfully');
    }
    
    //Function to Update Profile
    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sejarah' => 'required',
            'deskripsi' => 'required',
            'struktur_organisasi' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Profile_images', 'public');
            $validatedData['image'] = $imagePath;
        }
        if ($request->hasFile('struktur_organisasi')) {
            $imagePathStruktur = $request->file('struktur_organisasi')->store('Profile_images', 'public');
            $validatedData['struktur_organisasi'] = $imagePathStruktur;
        }
        
        $profile->update($validatedData);
        return redirect('/admin/profil')->with('success', 'Berita updated successfully');
    }
    
    //Function to Delete Profile
    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return redirect('/admin/profile')->with('success', 'Berita deleted successfully');
    }
    //Function to view Dashboard Profile
    public function view_dashboard()
    {
        $profiles = Profile::first();
        $crews = Crew::all();
        return view('dashboard.admin_profil', compact('profiles', 'crews'));
    }
    //Function to view Landing Profile
    public function view_landing()
    {
        $profiles = Profile::first();
        $crews = Crew::all();
        return view('profil', compact('profiles', 'crews'));
    }
}
