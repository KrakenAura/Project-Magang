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
        return view('dashboard.admin_linktv', compact('Profiles'));
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

        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('Profile_images', 'public');
            $validatedData['logo'] = $imagePath;
        }

        $profile = Profile::create($validatedData);
        return new ProfileResource($profile);
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        // dd($request->all());
        $validatedData =
            $request->validate([
                'nama_tv' => 'required|max:255',
                'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'link_web' => 'required',
                'link_insta' => 'required',
                'link_yt' => 'required',
            ]);

        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('Profile_images', 'public');
            $validatedData['logo'] = $imagePath;
        }

        $profile->update($validatedData);
        return new ProfileResource($profile);
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return response()->json(null, 204);
    }
}
