<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        return view("Pages.index");
    }

   
    public function about()
    {
        return view("Pages.about");
    }

   
    public function contact()
    {
        return view("Pages.contact");
    }

    public function find()
    {
        return view("Pages.find");
    }


    
}
