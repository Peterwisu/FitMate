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
@endsection
