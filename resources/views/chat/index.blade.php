@extends('layouts.app')


@section('content')
   

    <header>
    <h1>Let Talk</h1>
    <input type="text" name="username" id='username' placeholder='Please Enter Your Name....'>
</header>
<div id="messages">
    <form id=message_form>
        <input type="text" name="message" id="message_input" placeholder="Write a message ....">
        <button type="submit" id="message_send">Send Message</button>
    </form>
</div>

{{-- <script src="./js/app.js"></script> --}}

@endsection
