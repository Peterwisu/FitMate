<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Events\Message;
class ChatController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        return view('chat.index');
    }

    public function send(Request $request){



        event(new Message(
            $request->input('id'),
            $request->input('username'),
            $request->input('message')));
    
    
            return ["success"=>true];
    
    }
    

   
    


   
}
