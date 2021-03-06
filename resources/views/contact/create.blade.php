@extends('layouts.app')


@section('content')
<div class="container mb-5 mt-5">
    <div class="row justify-content-center" style="align-items: center;">
    <div class="col-md-5">
        <h1 class="contact-heading">Contact FitMate</h2>
        <p>We’re here to help and answer any question you might have. We look forward to hearing from you!</p>
        <div>
            <div><i class="fa fa-envelope me-3" aria-hidden="true"></i>fitmateapplication@gmail.com</div>
        </div>
    </div>

            <div class="col-md-7">
                <div class="mt-4">
                    <div class="text-center">

                        <form action="/contact" method="POST" id="vali_con">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name='name'class="form-control" placeholder="Full name" required>


                            </div>
                            <div class="mb-3">
                                <input type="email" name='email'class="form-control" placeholder="Email " required>


                            </div>
                            <div class="mb-3">
                            <input type="phone" name='phone'class="form-control" placeholder="Phone" required>
                            </div>

                            <div class="mb-3">

                                <textarea class="form-control" name='message'placeholder="Message" rows="3" required></textarea>


                            </div>
                            <div class="row">
                                <div class="col-md-8" style="text-align:left;">
                                    <button type="submit" onclick="validatecal()"class="btn btn-sub">Submit</button>
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
    <script>
        function validatecal() {

            //validate a form with id contact_form
            $("#vali_con").validate({

                //rule for validation fields
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true

                    },
                    phone: {
                        required: true
                    },
                    message: {
                        required: true
                    },
                   
                }, //message display if the form submit does not pass a requirement rules
                messages: {
                    name: {
                        required: "Name is required"
                    },
                    email: {
                        required: "Email is required"

                    },
                    phone: {
                        required: 
                    },
                    message: {
                        required: true
                    },

                },

            });
        }
    </script>
@endsection
