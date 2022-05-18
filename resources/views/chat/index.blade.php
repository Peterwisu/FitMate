@extends('layouts.app')


@section('content')
   


    <div class="main">
        <div class="px-2 scroll">
            <div class="" id="messages"></div>
        </div>
        <nav class="navbar bg-white navbar-expand-sm  justify-content-between">
            <div class="mx-2">

                <form id=message_form>
                    
                   
                      
                         
                            <input type="hidden" name="user_id" id='user_id' value="{{ auth()->user()->id }}">
                            <input type="hidden" name="username" id='username' value="{{ auth()->user()->name }}">
                            {{-- <input type="text" name="message" id="message_input" placeholder="Write a message ...."> --}}

                            <div class="row">

                                <div class="col-md-8">

                                    <textarea name="message" id="message_input" class="form-control"  style="width:100"cols="50" placeholder="Write a message ...."rows="2"></textarea>
                                </div>
                                <div class="col-md-4">

                                    <button type="submit" class="btn btn-sub " id="message_send">Send Message</button>
                                    
                                </div>
                            </div>
                                            
                 
                </form>
            </div>
        </nav>

    </div>
    <script>
        const { default: axios } = require('axios');
        const message_el = document.getElementById("messages");
const username_input = document.getElementById("username");
const message_input = document.getElementById('message_input');
const user_id = document.getElementById("user_id");
const message_form = document.getElementById('message_form');
const url = document.querySelector('meta[name="base_url"]').content +'/send-message'
const csrf_token = document.querySelector('meta[name="csrf-token"]').content

$('#message_send').click(function (e){

     e.preventDefault();


    let has_errors =false;

    if( username_input.value == ''){

        alert("Please enter a username");
        has_errors = true;
    }

    if(message_input.value == ''){

        alert("Please enter a message");
        has_errors = true;
    }

    if(has_errors){

        return;
    }


    const options = {

        method: 'POST',
        url:'/send-message',
       
        data:{
            id: user_id.value,
            username: username_input.value,
            message: message_input.value,
           

        },
        TransformResponse: [(data)=>{

            return data;
        }]

    }

        
    axios(options);
  
});

    </script>
@endsection
