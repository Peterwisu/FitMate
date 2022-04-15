@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-3"></div>
            <div class="col-md-6  d-flex align-content-center justify-content-center">
                <h1>
                     Your Profile
                </h1>
            </div>
            <div class="col-md-3"></div>
        </div>



        <div class="row mt-5 mb-5 ">

            <div class="col-2"></div>
            <div class="col-8 ">

                <div class="row mt-4 mb-4 ">
                    <div class="col ">Name:</div>
                    <div class="col "> {{ $profile->title}} {{Auth::user()->name}}</div>
                </div>


                <div class="row mt-4 mb-4">
                    <div class="col">email:</div>
                    <div class="col"> {{Auth::user()->email}}</div>
                </div>



                <div class="row mt-4 mb-4">
                    <div class="col">email verify:</div>

                    <!------- Check if email of this verify or not if not display button to send a verification link---->
                    @if (Auth::user()->email_verified_at == null)
                    <div class="col"> This account is not verify 


                        <form action="/email/resend" method="POST">
                            @csrf


                            <button type="submit" class="btn btn-dark" onclick="alert('Verification email has been sent')"> Click here to verify</button>
                        </form>
                    </div>
                    
                    @else
                    <div class="col">This account has been verified</div>
                    @endif
                   
                </div>

                

                <div class="row mt-4 mb-4">
                    <div class="col">Gender:</div>

                    
                    <div class="col"> {{ $profile->gender}} </div>
                    
                </div>



                <div class="row mt-4 mb-4">
                    <div class="col">Date of Birth:</div>
                    
                    <div class="col"> {{ $profile->date_of_birth}} </div>
                    
                </div>
               

                <div class="row mt-4 mb-4">
                    <div class="col">Age:</div>
                   
                    <div class="col"> {{ (date_diff(date_create($profile->date_of_birth), date_create(date("Y-m-d"))))->format('%y')}} </div>
                    
                </div>



                <div class="row mt-4 mb-4">
                    <div class="col">Activity Level:</div>

                    
                    <div class="col"> {{ $profile->act_level}} </div>
                    
                </div>


                



                <div class="row mt-4 mb-4">
                    <div class="col">Height:</div>
                   
                    <div class="col"> {{ $profile->height}} </div>
                    
                </div>



                <div class="row mt-4 mb-4">
                    <div class="col">Weight:</div>
                    
                    <div class="col"> {{ $profile->weight}} </div>
                    
                </div>

                <div class="row mt-4 mb-4">
                    <div class="col">Waist:</div>
                   
                    <div class="col"> {{ $profile->waist}} </div>
                    
                </div>


                <div class="row mt-4 mb-4">
                    <div class="col">Neck:</div>
                   
                    <div class="col"> {{ $profile->neck}} </div>
                    
                </div>







            </div>
            <div class="col-2"></div>
           


        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8  d-flex align-content-center justify-content-center"> 
            

                <button class="btn btn-dark" >
                    <a href="/profile/{{$profile->id}}/edit" style="color: aliceblue">Edit Your Profile</a>
                </button>
                

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


    </div>
@endsection
