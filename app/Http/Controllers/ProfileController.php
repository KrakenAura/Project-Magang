<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $social = Social::all();
        return SocialResource::collection($social);
    }

    public function view_dashboard()
    {
        $socials = Social::all();
        return view('dashboard.admin_linktv', compact('socials'));
    }

    public function show($id)
    {
        $social = Social::find($id);
        return new SocialResource($social);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_tv' => 'required|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'link_web' => 'required',
            'link_insta' => 'required',
            'link_yt' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('Social_images', 'public');
            $validatedData['logo'] = $imagePath;
        }

        $social = Social::create($validatedData);
        return new SocialResource($social);
    }

    public function update(Request $request, $id)
    {
        $social = Social::findOrFail($id);
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
            $imagePath = $request->file('logo')->store('Social_images', 'public');
            $validatedData['logo'] = $imagePath;
        }

        $social->update($validatedData);
        return new SocialResource($social);
    }

    public function destroy($id)
    {
        $social = Social::findOrFail($id);
        $social->delete();
        return response()->json(null, 204);
    }
}
