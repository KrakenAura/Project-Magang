<?php

namespace App\Http\Controllers;

use App\Http\Resources\GaleriResource;
use App\Models\Galery;
use Illuminate\Http\Request;

//Controller used for Galeri
class GaleryController extends Controller
{
    //Function to check API for return all Galeri
    public function index()
    {
        $galeri = Galery::all();
        return GaleriResource::collection($galeri);
    }

    //Function to check API for return Galeri by ID
    public function show($id)
    {
        $galeri = Galery::find($id);
        return new GaleriResource($galeri);
    }

    //Function to Storing Galeru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Galery_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $galeri = Galery::create($validatedData);
        return redirect('/admin/galeri')->with('success', 'Berita created successfully');
    }

    //Function to Update Galeri
    public function update(Request $request, $id)
    {
        $galeri = Galery::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'updated_at' => now(),
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Galery_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $galeri->update($validatedData);
        return redirect('/admin/galeri')->with('success', 'Berita updated successfully');
    }

    //Function to Delete Galeri
    public function destroy($id)
    {
        $galeri = Galery::findOrFail($id);
        $galeri->delete();
        return redirect('/admin/galeri')->with('success', 'Berita deleted successfully');
    }

    //Function to view Galeri Dashboard with parsed data
    public function view_dashboard()
    {
        $galeries = Galery::all();
        return view('dashboard.admin_galeri', compact('galeries'));
    }

    //Function to view Galeri Landing Page with parsed data
    public function view_landing()
    {
        $galeries = Galery::all();
        return view('galeri', compact('galeries'));
    }
}
