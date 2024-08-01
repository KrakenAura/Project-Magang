<?php

namespace App\Http\Controllers;

use App\Http\Resources\BeritaResource;
use App\Models\Berita;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    //General use
    public function index()
    {
        $berita = Berita::all();
        // return response()->json($berita);
        return BeritaResource::collection($berita);
    }

    public function view_berita($id)
    {
        $berita = Berita::findOrFail($id);
        $comments = Comment::where('news_id', $id)->with('replies')->get();
        return view('viewberita', compact('berita', 'comments'));
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
        ]);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('berita_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // dd($validatedData);
        $berita = Berita::create($validatedData);
        // return new BeritaResource($berita);
        $redirectUrl = '/admin/' . strtolower($validatedData['category']);

        return redirect($redirectUrl)->with('success', 'Berita created successfully');
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required',
            'author' => 'required|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('berita_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $berita->update($validatedData);
        // return new BeritaResource($berita);
        $redirectUrl = '/admin/' . strtolower($validatedData['category']);

        return redirect($redirectUrl)->with('success', 'Berita created successfully');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $category = $berita->category;
        $berita->delete();
        $categoryPath = strtolower($category);

        $redirectUrl = '/admin/' . $categoryPath;

        return redirect($redirectUrl)->with('success', 'Berita deleted successfully');
        // return response()->json(null, 204);
    }


    //Kota Terkini
    public function view_dashboard_kotaterkini()
    {
        $beritas = Berita::where('category', 'KotaTerkini')->get();
        return view('dashboard.admin_kotaterkini', compact('beritas'));
    }

    public function view_kotaterkini_edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('dashboard.admin_kotaterkini_edit', compact('berita'));
    }
    public function view_kotaterkini_tambah()
    {
        return view('dashboard.admin_kotaterkini_tambah');
    }


    //Layanan Publik
    public function view_dashboard_layananpublik()
    {
        $beritas = Berita::where('category', 'LayananPublik')->get();
        return view('dashboard.admin_layananpublik', compact('beritas'));
    }

    public function view_layananpublik_edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('dashboard.admin_layananpublik_edit', compact('berita'));
    }
    public function view_layananpublik_tambah()
    {
        return view('dashboard.admin_layananpublik_tambah');
    }

    //Kabar Balai Kota
    public function view_dashboard_kabarbalaikota()
    {
        $beritas = Berita::where('category', 'kabarbalaikota')->get();
        return view('dashboard.admin_kabarbalaikota', compact('beritas'));
    }

    public function view_kabarbalaikota_edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('dashboard.admin_kabarbalaikota_edit', compact('berita'));
    }
    public function view_kabarbalaikota_tambah()
    {
        return view('dashboard.admin_kabarbalaikota_tambah');
    }

    public function view_dashboard_citizen()
    {
        $beritas = Berita::where('category', 'citizen')->get();
        return view('dashboard.admin_citizen', compact('beritas'));
    }

    public function view_citizen_tambah()
    {
        return view('dashboard.admin_citizen_tambah');
    }
}
