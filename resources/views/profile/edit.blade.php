@extends('layouts.app')


@section('content')



<div class="container">

    <div class="row mt-4">
        <div class="col-md-3"></div>
        <div class="col-md-6  d-flex align-content-center justify-content-center">
            <h1>
                Edit Your Profile
            </h1>
        </div>
        <div class="col-md-3"></div>
        <div>

            <div class="row mt-4">
                <div class="col-md-2"></div>
                <div class="col-md-8 mt-4 align-content-center justify-content-center">

                    <div class="row mb-4">
                        <div class="col-6">
                            <label class=""> Name</label>
                        </div>
                        <div class="col-6">
                            <label class=""> {{ Auth::user()->name }}</label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class=""> Email</label>
                        </div>
                        <div class="col-6">
                            <label class=""> {{ Auth::user()->email }}</label>
                        </div>
                    </div>




                    <form action="/profile/{{$profile->id}}" method="POST" id='vali_cal'>
                        @csrf
                        @method('PUT')
                        <div class="row mb-2">
                            <div class="col-6">
                                <label class=""> Title</label>
                            </div>
                            <div class="col-6">


                                <select class="form-control form-control-lg" name="title" required>
                                    <option selected value='{{$profile->title}}'>{{$profile->title}}</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Prof.">Prof.</option>
                                </select>

                            </div>
                        </div>


                        <div class="row mb-2">
                            <div class="col-6">
                                <label class=""> Gender</label>
                            </div>
                            <div class="col-6">
                                <select class="form-control form-control-lg" name="gender" required>
                                    <option selected value='{{$profile->gender}}'>{{$profile->gender}}</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="non-Binary">Non-binary/non-conforming</option>
                                    <option value="transgender">Transgender</option>
                                    <option value="others">Other</option>
                                    <option value="prefer_not_tosay">Prefer not to say</option>



                                </select>
                            </div>
                        </div>




                        <div class="row mb-2">
                            <div class="col-6">
                                <label class=""> Date of birth</label>
                            </div>
                            <div class="col-6">

                                <input class="form-control" type="date" name="DateOfBirth" value="{{ $profile->date_of_birth}}" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
                                <label class=""> Activity Level</label>
                            </div>
                            <div class="col-6">
                                <select class="form-control form-control-lg" name="act_level" required>
                                    <option selected value='{{$profile->act_level}}'>{{$profile->act_level}}</option>
                                    <option value='Sedentary'>Sedentary: Little or no exercise</option>
                                    <option value="Light">Light: Exercise 1-3 times/week</option>
                                    <option value="Moderate">Moderate: Exercise 4-5 times/week</option>
                                    <option value="Active">Active: Daily exercise 3-4 times/week</option>
                                    <option value="VeryActive">Very Active: Intense exercise 6-7 times/week </option>
                                    <option value="ExtremelyActive">Extremely Active: Very intense exercise daily, or physical job</option>


                                </select>
                            </div>
                        </div>



                        <div class="row mb-2">
                            <div class="col-6">
                                <label class=""> Height</label>
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control" placeholder="Your height in CM"
                                    name='height' value="{{$profile->height}}" required>
                            </div>
                        </div>


                        <div class="row mb-2">
                            <div class="col-6">
                                <label class=""> Weight</label>
                            </div>
                            <div class="col-6">
                                <input type="number" placeholder="Your weight in Kg" class="form-control"
                                    name="weight" value="{{$profile->weight}}" required>
                            </div>
                        </div>


                        <div class="row mb-2">
                            <div class="col-6">
                                <label class=""> Neck</label>
                            </div>
                            <div class="col-6">
                                <input type="number" placeholder="Your neck in CM" class="form-control" name='neck' value="{{$profile->neck}}" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
                                <label class=""> Waist</label>
                            </div>
                            <div class="col-6">
                                <input type="number" placeholder="Your waist in CM" class="form-control" name="waist" value="{{$profile->waist}}" required>
                            </div>
                        </div>

                        <div class="row mb-2 mt-4 w-50" style="margin: 0 auto">
                            <button type="submit" onclick="validatecal() "class="btn btn-dark form-control">Submit</button>
                        </div>





                    </form>


                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <script>



        function validatecal()  {

                //validate a form with id contact_form
                $("#vali_cal").validate({

                    //rule for validation fields
                    rules: {
                        title: {
                            required: true
                        },
                        gender: {
                            required: true

                        },
                        act_level: {
                            required: true
                        },
                        DateOfBirth: {
                            required: true
                        },
                        height:{
                            required: true,
                            range: [60, 260]

                        },
                        weight:{
                            required: true,
                            range: [30, 200]
                        },
                        neck:{
                            required: true,
                            range: [15, 50]
                        },
                        waist:{
                            required :true,
                            range: [40, 130]


                        }
                    }, //message display if the form submit does not pass a requirement rules
                    messages: {
                        title: {
                            required: "Title is required"
                        },
                        gender: {
                            required: "Gender is required"

                        },
                        act_level: {
                            required: "Activity level is required"
                        },
                        DateOfBirth: {
                            required: "Date of Birth is required"
                        },
                        height:{
                            required: "Height is required",
                            range: "Out of range 60-260"

                        },
                        weight:{
                            required: "Weight is required",
                            range: "Out of range 30-200"
                        },
                        neck:{
                            required: "Neck is required",
                            range: "Out of range 15-30"
                        },
                        waist:{
                            required :"Wasit is required",
                            range: "Out of range 40-130"
                        }

                    },

                });
            }

    </script>

    <!---- display error message from server side validation --->
    @if ($errors->any())
        <div class=" mt-5" role="alert">
            @foreach ($errors->all() as $err)
                <div class="alert alert-danger mt-2" role="alert">
                    <li> {{ $err }}</li>
                </div>
            @endforeach
        </div>
    @endif


</div>

@endsection
