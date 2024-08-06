<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Http\Resources\ProfileResource;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::all();
        return ProfileResource::collection($profile);
    }

    public function view_dashboard()
    {
        $profiles = Profile::all();
        return view('dashboard.admin_profile', compact('Profiles'));
    }

    public function show($id)
    {
        $profile = Profile::find($id);
        return new ProfileResource($profile);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sejarah' => 'required',
            'struktur_organisasi' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Profile_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $profile = Profile::create($validatedData);
        return redirect('/admin/profile')->with('success', 'Berita created successfully');
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        // dd($request->all());
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sejarah' => 'required',
            'struktur_organisasi' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Profile_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $profile->update($validatedData);
        return redirect('/admin/profile')->with('success', 'Berita updated successfully');
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return redirect('/admin/profile')->with('success', 'Berita deleted successfully');
    }
}
