<?php

namespace App\Http\Controllers;

use App\Http\Resources\BeritaResource;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        // return response()->json($berita);
        return BeritaResource::collection($berita);
    }

    public function show($id)
    {
        $berita = Berita::find($id);
        return new BeritaResource($berita);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'date' => now(),
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|max:255',
            'category' => 'required',
            'created_at' => 'required|date_format:Y-m-d H:i:s',
            'updated_at' => 'required|date_format:Y-m-d H:i:s',

        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('berita_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $berita = Berita::create($validatedData);
        return new BeritaResource($berita);
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|max:255',
            'category' => 'required',
            'created_at' => 'required|date',
            'updated_at' => 'required|date',
        ]);

        $berita->update($validatedData);
        return new BeritaResource($berita);
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();
        return response()->json(null, 204);
    }
}
