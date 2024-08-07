<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slideshow;
use App\Models\Description;
use App\Models\Address;
use App\Models\Livestream;
use App\Models\social;
use App\Models\Footer;

class HomeController extends Controller
{
    public function view_dashboard()
    {
        $slideshows = Slideshow::all();
        $livestreams = Livestream::all();
        $socials = Social::all();

        $footer = Footer::first();

        return view('dashboard.admin_beranda', compact('slideshows', 'livestreams', 'socials', 'footer'));
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
}
