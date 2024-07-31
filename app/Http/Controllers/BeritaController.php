<?php

namespace App\Http\Controllers;

use App\Http\Resources\BeritaResource;
use App\Models\Berita;
use App\Models\Comment;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        // return response()->json($berita);
        return BeritaResource::collection($berita);
    }

    public function view_dashboard()
    {
        $beritas = Berita::where('category', 'KotaTerkini')->get();
        return view('dashboard.admin_kotaterkini', compact('beritas'));
    }

    public function view_berita($id)
    {
        $berita = Berita::findOrFail($id);
        $comments = Comment::where('news_id', $id)->with('replies')->get();
        return view('viewberita', compact('berita', 'comments'));
    }

    public function view_edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('dashboard.admin_kotaterkini_edit', compact('berita'));
    }
    public function view_tambah()
    {
        return view('dashboard.admin_kotaterkini_tambah');
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
            'teaser' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|max:255',
            'category' => 'required',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('berita_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $berita = Berita::create($validatedData);
        // return new BeritaResource($berita);
        return redirect('/admin/kotaterkini')->with('success', 'Berita created successfully');
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
        ]);

        $berita->update($validatedData);
        // return new BeritaResource($berita);
        return redirect('/admin/kotaterkini')->with('success', 'Berita updated successfully');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();
        return redirect('/admin/kotaterkini')->with('success', 'Berita deleted successfully');
        // return response()->json(null, 204);
    }
}
