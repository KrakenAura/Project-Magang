<?php

namespace App\Http\Controllers;

use App\Models\social;
use App\Http\Resources\SocialResource;
use Illuminate\Http\Request;

//Controller used for Link TV Desa
class SocialController extends Controller
{
    //Function to check API for return all Social
    public function index()
    {
        $social = Social::all();
        return SocialResource::collection($social);
    }

    //Function to check API for return Social by ID
    public function show($id)
    {
        $social = Social::find($id);
        return new SocialResource($social);
    }

    //Function to store Social
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
        return redirect('/admin/contactus')->with('success', 'Berita created successfully');
    }

    //Function to Update Social
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
        return redirect('/admin/contactus')->with('success', 'Berita updated successfully');
    }

    //Function to Delete Social
    public function destroy($id)
    {
        $social = Social::findOrFail($id);
        $social->delete();
        return redirect('/admin/contactus')->with('success', 'Berita deleted successfully');
    }

    //Function to view Dashboard Social
    public function view_dashboard()
    {
        $socials = Social::all();
        return view('dashboard.admin_contactus', compact('socials'));
    }

    //Function to view Landing Page Social
    public function view_landing()
    {
        $socials = Social::all();
        return view('contactus', compact('socials'));
    }
}
