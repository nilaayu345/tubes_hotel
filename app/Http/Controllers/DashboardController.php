<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::simplePaginate(4);

        return view('dashboard.index', compact('rooms'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function aboutUs() 
    {
        return view('dashboard.about_us');
    }
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public function booking() 
    {
        $rooms = Room::all();
        
        return view('dashboard.booking', compact('rooms'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function gallery() 
    {
        $galleries = Gallery::all();

        return view('dashboard.gallery', compact('galleries'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function contactUs() 
    {
        return view('dashboard.contact_us');
    }
}
