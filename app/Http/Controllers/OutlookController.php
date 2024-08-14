<?php

namespace App\Http\Controllers;

use App\Http\Resources\OutlookResource;
use Illuminate\Http\Request;
use App\Models\Outlook;

//Controller used for Program TV Desa
class OutlookController extends Controller
{
    //Function to check API for return all Outlook
    public function index()
    {
        $outlook = Outlook::all();
        return OutlookResource::collection($outlook);
    }

    //Function to check API for return Outlook by ID
    public function show($id)
    {
        $outlook = Outlook::find($id);
        return new OutlookResource($outlook);
    }

    //Function to Store Outlook
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Outlook_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $outlook = Outlook::create($validatedData);
        return redirect()->route('admin.programtvdesa')->with('success', 'Outlook created successfully');
    }

    //Function to Update Outlook
    public function update(Request $request, $id)
    {
        $outlook = Outlook::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Outlook_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $outlook->update($validatedData);
        return redirect()->route('admin.programtvdesa')->with('success', 'Outlook updated successfully');
    }

    //Function to Delete Outlook
    public function destroy($id)
    {
        $outlook = Outlook::findOrFail($id);
        $outlook->delete();
        return redirect()->route('admin.programtvdesa')->with('success', 'Outlook deleted successfully');
    }

    //Function to view Dashboard Outlook
    public function view_dashboard()
    {
        $outlooks = Outlook::all();
        return view('dashboard.admin_linktv', compact('outlooks'));
    }

    //Function to view Landing Page Outlook
    public function view_landing()
    {
        $outlooks = Outlook::all();
        return view('linktv', compact('outlooks'));
    }
}
