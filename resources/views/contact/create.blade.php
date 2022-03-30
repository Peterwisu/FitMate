@extends('layouts.app')


@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">

            <div class="col-md-7">
                <div class="card mt-4">

                    <div class="card-body text-center">

                        <div class="row mb-4">
                            <h1 class="">Contact Us </h1>
                        </div>

                        <form action="/contact" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label  class="form-label">Email address</label>
                                <input type="email" name='email'class="form-control" placeholder="name@example.com">
                               

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name='name'class="form-control" placeholder="Your name">
                                
                                
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Your Message</label>
                                <textarea class="form-control" name='message'placeholder="message" rows="3"></textarea>
                                
                                
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-8 text-center ">
                                    <button type="submit" class="btn btn-secondary ">Submit</button>
                                </div>
                            </div>
                        </form>


                        <!---- display error message from server side validation --->
                        @if ($errors->any())
                            <div class=" mt-5" role="alert">
                                @foreach ($errors->all() as $err)
                                <div class="alert alert-danger mt-2" role="alert">
                                    <li> {{$err}}</li>       
                                </div>                         
                                @endforeach
                            </div>
                        @endif






                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
