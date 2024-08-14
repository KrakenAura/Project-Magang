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
use App\Models\Outlook;
use App\Models\berita;
use App\Models\Banner;

//Function used to Modify Home Content
class HomeController extends Controller
{
    //Function to view Dashboard
    public function view_dashboard()
    {
        $slideshows = Slideshow::all();
        $livestreams = Livestream::all();

        $footer = Footer::first();
        $banners = Banner::whereIn('id', [1, 2])->get();


        return view('dashboard.admin_beranda', compact('slideshows', 'livestreams', 'footer', 'banners'));
    }

    //Function to view Landing Page
    public function view_landing()
    {
        $slideshows = Slideshow::all();
        $socials = social::all();
        $livestream = Livestream::first();
        $latestNews = Berita::orderBy('created_at', 'desc')->take(2)->get();
        $othersNews = Berita::orderBy('created_at', 'desc')->take(2)->skip(2)->get();
        $outlooks = Outlook::orderBy('created_at', 'asc')->take(6)->get();
        $banners = Banner::all();
        $footer = Footer::first();

        return view('home0', compact('slideshows', 'livestream', 'footer', 'latestNews', 'outlooks', 'socials', 'othersNews', 'banners'));
    }

    //Footer
    //Function used for Update Footer
    public function updateFooter(Request $request, $id)
    {
        $footer = Footer::findOrFail($id);
        $validatedData = $request->validate([
            'description' => 'required',
            'address' => 'required',
        ]);

        $footer->update($validatedData);
        return redirect('/admin/beranda')->with('success', 'Berita updated successfully');
    }

    //Livestream
    //Function used for Update Livestream
    public function updateLiveStream(Request $request, $id)
    {
        $livestream = Livestream::findOrFail($id);
        $validatedData = $request->validate([
            'stream_url' => 'required',
        ]);

        //Used to rename the shared live link to embed link
        $validatedData['stream_url'] = str_replace('/live/', '/embed/', $validatedData['stream_url']);

        $livestream->update($validatedData);
        return redirect('/admin/beranda')->with('success', 'Berita updated successfully');
    }


    //Slideshow
    //Function used for Storing Slideshow
    public function storeSlideShow(Request $request)
    {
        $validatedData = $request->validate([
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('Home_images', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        $slideshow = Slideshow::create($validatedData);
        return redirect()->route('admin.beranda')->with('success', 'Outlook created successfully');
    }

    //Function used for Update Slideshow
    public function updateSlideShow(Request $request, $slideshowId)
    {
        $slideshow = Slideshow::findOrFail($slideshowId);

        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($slideshow->image_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($slideshow->image_path);
            }

            $imagePath = $request->file('image')->store('Home_images', 'public');
            $slideshow->image_path = $imagePath;
        }

        $slideshow->save();

        return redirect('/admin/beranda')->with('success', 'Slideshow image updated successfully');
    }

    //Banner
    //Function used for Update Banner
    public function updateBanner(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $validatedData = $request->validate([
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'updated_at' => now(),
        ]);

        if ($request->hasFile('banner')) {
            if ($banner->banner) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($banner->banner);
            }

            $imagePath = $request->file('banner')->store('Home_images', 'public');
            $validatedData['banner'] = $imagePath;
        }

        $banner->update($validatedData);
        return redirect('/admin/beranda')->with('success', 'Banner updated successfully');
    }
}
