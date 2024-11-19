<?php

namespace App\Http\Controllers;

use App\Http\Resources\BeritaResource;
use App\Models\Berita;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    //General use for all category

    //Function to return all Berita
    public function index()
    {
        $berita = Berita::all();
        return BeritaResource::collection($berita);
    }

    //Function to return Berita by ID
    public function view_berita($id)
    {
        $berita = Berita::findOrFail($id);
        $latestNews = Berita::orderBy('created_at', 'desc')->where('status', 'verified')->take(2)->get();
        $comments = Comment::where('news_id', $id)->whereNull('parent_id')->with('replies')->get();
        return view('viewberita', compact('berita', 'comments', 'latestNews'));
    }

    //Function to return Berita by ID
    public function show($id)
    {
        $berita = Berita::find($id);
        return new BeritaResource($berita);
    }


    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|min:50',
                'teaser' => 'required|string|max:255|min:10',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'author' => 'required|string|max:255',
                'category' => 'required|string',
            ], [
                'title.required' => 'News title is required',
                'title.max' => 'Title cannot exceed 255 characters',
                'description.required' => 'News content is required',
                'description.min' => 'News content must be at least 50 characters',
                'teaser.required' => 'Teaser is required',
                'teaser.max' => 'Teaser cannot exceed 255 characters',
                'teaser.min' => 'Teaser must be at least 10 characters',
                'image.required' => 'Cover image is required',
                'image.image' => 'File must be an image',
                'image.mimes' => 'Image must be jpeg, png, jpg, or gif format',
                'image.max' => 'Image size cannot exceed 2MB',
                'author.required' => 'Author name is required',
                'author.max' => 'Author name cannot exceed 255 characters',
                'category.required' => 'News category is required'
            ]);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('berita_images', 'public');
                $validatedData['image'] = $imagePath;
            }

            if ($validatedData['category'] === 'CitizenJournalist') {
                $validatedData['status'] = 'pending';
            } else {
                $validatedData['status'] = 'verified';
            }

            $berita = Berita::create($validatedData);
        
            return redirect('/citizen')->with('success', 'Your news has been submitted successfully and is pending review');
        
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to submit news: ' . $e->getMessage()]);
        }
        \Illuminate\Support\Facades\Log::info('Store method called');
        \Illuminate\Support\Facades\Log::info($request->all());
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'date' => now(),
            'description' => 'required',
            'teaser' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|max:255',
            'category' => 'required',
            'status' => 'nullable',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('berita_images', 'public');
            $validatedData['image'] = $imagePath;
        }
        if ($validatedData['category'] === 'CitizenJournalist') {
            $validatedData['status'] = 'pending';
        } else {
            $validatedData['status'] = 'verified';
        }
        $berita = Berita::create($validatedData);
        if (strtolower($validatedData['category']) === 'CitizenJournalist') {
            $redirectUrl = '/citizen';
        } else {
            $redirectUrl = '/admin/' . strtolower($validatedData['category']);
        }
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
        $redirectUrl = '/admin/' . strtolower($validatedData['category']);

        return redirect($redirectUrl)->with('success', 'Berita created successfully');
    }

    public function updateStatus(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        $validatedData = $request->validate([
            'status' => 'required|in:pending,verified',
        ]);

        $berita->status = $validatedData['status'];
        $berita->save();

        return redirect()->back()->with('success', 'Berita status updated successfully');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $category = $berita->category;
        $berita->delete();
        $categoryPath = strtolower($category);

        $redirectUrl = '/admin/' . $categoryPath;

        return redirect($redirectUrl)->with('success', 'Berita deleted successfully');
    }
    public function view_by_category(Request $request, $category)
    {
        $search = $request->input('search');
        $query = Berita::where('category', $category);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            });
        }

        $beritas = $query->orderBy('created_at', 'desc')->paginate(5);

        return view('dashboard.admin_' . strtolower($category) . '_lihatsemua', compact('beritas', 'category'));
    }




    //Kota Terkini
    public function view_landing_kotaterkini()
    {
        $latestBeritas = Berita::where('category', 'KotaTerkini')
            ->where('status', 'verified')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();
        $olderBeritas = Berita::where('category', 'KotaTerkini')
            ->where('status', 'verified')
            ->orderBy('id', 'desc')
            ->skip(3)
            ->paginate(6);
        return view('kotaterkini', compact('latestBeritas', 'olderBeritas'));
    }
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
    public function view_landing_layananpublik()
    {
        $latestBeritas = Berita::where('category', 'LayananPublik')
            ->where('status', 'verified')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();
        $olderBeritas = Berita::where('category', 'LayananPublik')
            ->where('status', 'verified')
            ->orderBy('id', 'desc')
            ->skip(3)
            ->paginate(6);
        return view('layananpublik', compact('latestBeritas', 'olderBeritas'));
    }
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
    public function view_landing_kabarbalaikota()
    {
        $latestBeritas = Berita::where('category', 'KabarBalaiKota')
            ->where('status', 'verified')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();
        $olderBeritas = Berita::where('category', 'KabarBalaiKota')
            ->where('status', 'verified')
            ->orderBy('id', 'desc')
            ->skip(3)
            ->paginate(6);
        return view('kabarbalaikota', compact('latestBeritas', 'olderBeritas'));
    }
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


    //Citizen Journalist
    public function view_landing_citizen()
    {
        $latestBeritas = Berita::where('category', 'CitizenJournalist')
            ->where('status', 'verified')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();
        $olderBeritas = Berita::where('category', 'CitizenJournalist')
            ->where('status', 'verified')
            ->orderBy('id', 'desc')
            ->skip(3)
            ->paginate(6);
        return view('citizenjournalist', compact('latestBeritas', 'olderBeritas'));
    }

    public function view_dashboard_citizen()
    {
        $beritas = Berita::where('category', 'CitizenJournalist')->get();
        return view('dashboard.admin_citizen', compact('beritas'));
    }

    public function view_citizen_tambah()
    {
        return view('dashboard.admin_citizen_tambah');
    }
}
