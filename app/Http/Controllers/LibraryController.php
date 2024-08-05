<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Http\Resources\LibraryResource;

class LibraryController extends Controller
{
    public function index()
    {
        $librarys = Library::all();
        return view('download', compact('librarys'));
    }

    public function view_dashboard()
    {
        $librarys = Library::all();
        return view('dashboard.admin_library', compact('librarys'));
    }

    public function show($id)
    {
        $library = Library::find($id);
        return new LibraryResource($library);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required',
            'link' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Library_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $library = Library::create($validatedData);
        return new LibraryResource($library);
    }

    public function update(Request $request, $id)
    {
        $library = Library::findOrFail($id);
        // dd($request->all());
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required',
            'link' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Library_images', 'public');
            $validatedData['image'] = $imagePath;
        }
        // dd($validatedData);

        $library->update($validatedData);
        return new LibraryResource($library);
    }

    public function destroy($id)
    {
        $library = Library::findOrFail($id);
        $library->delete();
        return response()->json(null, 204);
    }
}
