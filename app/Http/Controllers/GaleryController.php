<?php

namespace App\Http\Controllers;

use App\Http\Resources\GaleriResource;
use App\Models\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index()
    {
        $galeri = Galery::all();
        return GaleriResource::collection($galeri);
    }

    public function show($id)
    {
        $galeri = Galery::find($id);
        return new GaleriResource($galeri);
    }
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

    public function update(Request $request, $id)
    {
        $galeri = Galery::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'updated_at' => now(),
        ]);

        $galeri->update($validatedData);
        return redirect('/admin/galeri')->with('success', 'Berita updated successfully');
    }

    public function destroy($id)
    {
        $galeri = Galery::findOrFail($id);
        $galeri->delete();
        return redirect('/admin/galeri')->with('success', 'Berita deleted successfully');
    }

    public function view_dashboard()
    {
        $galeries = Galery::all();
        return view('dashboard.admin_galeri', compact('galeries'));
    }
}
