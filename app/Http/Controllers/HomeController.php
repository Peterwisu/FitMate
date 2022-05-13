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
        // restrict page to unlogin unlogin user
        //$this->middleware(['auth','verified']);
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




    public function find()
    {
        return view("Pages.find");
    }

    public function privacy()
    {
        return view("Pages.privacy");
    }

    public function terms()
    {
        return view("Pages.terms");
    }

    public function calculator(){

        return view("Pages.calculator");
    }


}
