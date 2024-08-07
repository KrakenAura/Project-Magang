<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slideshow;
use App\Models\Description;
use App\Models\Address;
use App\Models\Livestream;

class HomeController extends Controller
{
    public function index()
    {
        $slideshows = Slideshow::all();
        $livestreams = Livestream::all();

        $description = Description::first();
        $address = Address::first();

        return view('home0', compact('slideshows', 'livestreams', 'description', 'address'));
    }
}
