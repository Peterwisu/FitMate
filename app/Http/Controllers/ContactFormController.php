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
        $data = request()->validate([

             'name'    => 'required',
             'email'   => 'required',
             'message' => 'required',

         ]);
        

        // send an email to mail trap
        Mail::to('test@test.com')->send(new ContactFormMail($data));

         
        return redirect('/contact/respond');

    }


    public function respond(){

        return view('contact.respond');
    }
}
