@extends('layouts.app')


@section('content')


    <div class="container">

        <div class="row mt-4 ">

            <div class="col-md-3"></div>
            <div class="col-md-6 d-flex align-content-center justify-content-center">
                <h1>
                    Your Fitness
                </h1>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row mt-5 mb-5">

            <div class="col-2"></div>
            <div class="col-8">

                <div class="row mt-4 mb-4">

                    <div class="col"> Your weight </div>
                    <div class="col">    {{$health->getProfile($health->id)->weight}}         </div>
                </div>



                <div class="row mt-4 mb-4">

                    <div class="col"> Your Height </div>
                    <div class="col">     {{$health->getProfile($health->id)->height}}         </div>
                </div>


                <div class="row mt-4 mb-4">

                    <div class="col"> Your Neck </div>
                    <div class="col">      {{$health->getProfile($health->id)->neck}}        </div>
                </div>



                <div class="row mt-4 mb-4">

                    <div class="col"> Your Waist </div>
                    <div class="col">       {{$health->getProfile($health->id)->waist}}       </div>
                </div>


                <div class="row mt-4 mb-4">

                    <div class="col"> Your BMI </div>
                    <div class="col">     {{$health->bmi}}   kg/m²     </div>
                </div>


                <div class="row mt-4 mb-4">

                    <div class="col"> Your BMI category </div>
                    <div class="col">   {{$health->bmi_cat}}              </div>
                </div>

                <div class="row mt-4 mb-4">

                    <div class="col"> Your Body Fat Percentage </div>
                    <div class="col">       {{$health->bfp}}   %       </div>
                </div>


                <div class="row mt-4 mb-4">

                    <div class="col"> Your Body Fat category </div>
                    <div class="col">            {{$health->bfp_cat}}               </div>
                </div>




            </div>
            <div class="col-2"></div>


        </div>



        <div class="row mb-5">
            <div class="col-md-2"></div>
            <div class="col-md-8  d-flex align-content-center justify-content-center"> 
            

                <button class="btn btn-dark" >
                    <a href="/profile/{{$health->id}}/edit" style="color: aliceblue">Edit Your Profile</a>
                </button>
                

            </div>
            <div class="col-md-2"></div>
        </div>


    </div>


@endsection