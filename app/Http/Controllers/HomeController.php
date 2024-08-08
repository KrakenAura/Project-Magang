<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use \Illuminate\Support\Facades\Log;
use App\Models\Slideshow;
use App\Models\Description;
use App\Models\Address;
use App\Models\Livestream;
use App\Models\social;
use App\Models\Footer;
use App\Models\berita;

class HomeController extends Controller
{
    public function view_dashboard()
    {
        $slideshows = Slideshow::all();
        $livestreams = Livestream::all();

        $footer = Footer::first();
        

        return view('dashboard.admin_beranda', compact('slideshows', 'livestreams', 'footer'));
    }

    public function view_landing()
    {
        $slideshows = Slideshow::all();
        $livestreams = Livestream::all();
        $latestNews = Berita::orderBy('created_at', 'asc')->take(2)->get();


        $footer = Footer::first();

        return view('home0', compact('slideshows', 'livestreams', 'footer'));
    }

    //Footer
    public function updateFooter(Request $request, $id)
    {
        $footer = Footer::findOrFail($id);
        // dd($request->all());
        $validatedData = $request->validate([
            'description' => 'required',
            'address' => 'required',
        ]);

        $footer->update($validatedData);
        return redirect('/admin/beranda')->with('success', 'Berita updated successfully');
    }

    public function updateLiveStream(Request $request, $id)
    {
        $livestream = Livestream::findOrFail($id);
        // dd($request->all());
        $validatedData = $request->validate([
            'stream_url' => 'required',
        ]);

        $livestream->update($validatedData);
        return redirect('/admin/beranda')->with('success', 'Berita updated successfully');
    }


    public function storeSlideShow(Request $request)
    {
        $validatedData = $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('image_path')) {
                $image = $request->file('image_path');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('Home_images', $imageName, 'public');
                $validatedData['image_path'] = $imagePath;
            }

            Slideshow::create($validatedData);

            return redirect('/admin/beranda')->with('success', 'Slideshow image added successfully');
        } catch (\Exception $e) {
            // Log the error for debugging:
            Log::error('Error adding slideshow image: ' . $e->getMessage());

            return redirect('/')->with('error', 'An error occurred while uploading the image.');
        }
    }
    public function updateSlideShow(Request $request, $slideshowId)
    {
        $slideshow = Slideshow::findOrFail($slideshowId);

        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation as needed
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($slideshow->image_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($slideshow->image_path);
            }

            $imagePath = $request->file('image')->store('Home_images', 'public');
            $slideshow->image_path = $imagePath;
        }

        $slideshow->save();

        return redirect('/admin/beranda')->with('success', 'Slideshow image updated successfully');
    }
}
