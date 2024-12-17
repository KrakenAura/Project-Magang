<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Http\Resources\ComplaintResource;


//Controller used for Warga Bicara (Pengaduan)
class ComplaintController extends Controller
{
    //Function to check API for return all Complaint
    public function index()
    {
        $complaint = Complaint::all();
        return ComplaintResource::collection($complaint);
    }

    //Function for return Landing view with parsed data
    public function view_landing()
    {
        //Generate new nomor pengaduan
        $date = now()->format('Ymd');
        $lastComplaint = Complaint::latest()->first();
        $id = $lastComplaint ? $lastComplaint->id + 1 : 1;
        $nomor_pengaduan = "WB-{$date}-{$id}";

        return view('pengaduan', compact('nomor_pengaduan'));
    }

    //Function for return Dashboard view with parsed data
    public function view_dashboard()
    {
        $complaints = Complaint::all();
        return view('dashboard.admin_wargabicara', compact('complaints'));
    }

    //Function for API return detailed complaint
    public function show($id)
    {
        $complaint = Complaint::find($id);
        return new ComplaintResource($complaint);
    }

    //Function for Storing Complaint
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nomor_pengaduan' => 'required',
                'nama' => 'required',
                'nomor_telepon' => 'required',
                'email' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'deskripsi' => 'required',
                'status' => 'required',
            ]);
            $validatedData['tanggal'] = now();
            $imagePath = $request->file('image')->store('WargaBicara_images', 'public');
            $validatedData['image'] = $imagePath;
            $complaint = Complaint::create($validatedData);
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create complaint');
        }
        return redirect()->route('complaint.landing')->with('success', 'Complaint created successfully');
    }

    //Function for Updating Complaint
    public function update(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        $validatedData = $request->validate([
            'nomor_pengaduan' => 'required',
            'nama' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required',
            'tanggal' => now(),
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        // Upload image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('WargaBicara_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $complaint->update($validatedData);
        return redirect()->route('wargabicara')->with('success', 'Complaint updated successfully');
    }

    //Function for Deleting Complaint
    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();
        return redirect()->route('admin.wargabicara')->with('success', 'Outlook deleted successfully');
    }
}
