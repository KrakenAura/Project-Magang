<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Http\Resources\ComplaintResource;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaint = Complaint::all();
        return ComplaintResource::collection($complaint);
    }

    public function view_dashboard()
    {
        $complaints = Complaint::all();
        return view('dashboard.admin_linktv', compact('outlooks'));
    }

    public function show($id)
    {
        $complaint = Complaint::find($id);
        return new ComplaintResource($complaint);
    }
    public function store(Request $request)
    {
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

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Outlook_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $complaint = Complaint::create($validatedData);
        return redirect()->route('admin.wargabicara')->with('success', 'Outlook created successfully');
    }

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

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Outlook_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $complaint->update($validatedData);
        return redirect()->route('admin.wargabicara')->with('success', 'Outlook updated successfully');
    }

    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();
        return redirect()->route('admin.wargabicara')->with('success', 'Outlook deleted successfully');
    }
}
