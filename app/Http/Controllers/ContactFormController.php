<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    
    public function create(){

        return view('contact.create');

    }

    public function store(Request $request){


        
        // validation for contact from
        request()->validate([

             'name'    => 'required',
             'email'   => 'required',
             'message' => 'required',

         ]);
        
        $data = $request->all();
        

        // send mail to user
        Mail::to($request->email)->send(new ContactFormMail($data));
        // send mail to the fitmate email 
        Mail::to('fitmateapplication@gmail.com')->send(new ContactFormMail($data));
        

         
        return redirect('/contact/respond');

    }


    public function respond(){

        return view('contact.respond');
    }
}
