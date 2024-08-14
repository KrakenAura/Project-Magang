<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Http\Resources\LibraryResource;

//Controller used for Library
class LibraryController extends Controller
{
    //Function to check API for return all Library
    public function index()
    {
        $librarys = Library::all();
        return view('download', compact('librarys'));
    }

    
    //Function to check API for return Library by ID
    public function show($id)
    {
        $library = Library::find($id);
        return new LibraryResource($library);
    }
    //Function to Storing Library
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'required',
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Library_images', 'public');
            $validatedData['image'] = $imagePath;
        }
        
        $library = Library::create($validatedData);
        return redirect('/admin/library')->with('success', 'Berita created successfully');
    }
    //Function to Update Library
    public function update(Request $request, $id)
    {
        $library = Library::findOrFail($id);
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'required',
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Library_images', 'public');
            $validatedData['image'] = $imagePath;
        }
        
        $library->update($validatedData);
        return redirect('/admin/library')->with('success', 'Berita updated successfully');
    }
    
    //Function to Delete Library
    public function destroy($id)
    {
        $library = Library::findOrFail($id);
        $library->delete();
        return redirect('/admin/library')->with('success', 'Berita deleted successfully');
    }
    //Function to view Dashboard Library
    public function view_dashboard()
    {
        $librarys = Library::all();
        return view('dashboard.admin_library', compact('librarys'));
    }
}
