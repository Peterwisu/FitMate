@extends('layouts.app')


@section('content')
    <div class="container">

        <div class="row mt-4">
            <div class="col-md-3"></div>
            <div class="col-md-6  d-flex align-content-center justify-content-center">
                <h1>
                    Setup Your Profile
                </h1>
            </div>
            <div class="col-md-3"></div>
            <div>

                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 mt-4 align-content-center justify-content-center">

                        <div class="row mb-4">
                            <div class="col-6 form-group">
                                <label class=""> Name</label>
                            </div>
                            <div class="col-6 form-group">
                                <label class=""> {{ Auth::user()->name }}</label>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6 form-group">
                                <label class=""> Name</label>
                            </div>
                            <div class="col-6 form-group">
                                <label class=""> {{ Auth::user()->email }}</label>
                            </div>
                        </div>




                        <form action="/profile" method="POST">
                            @csrf

                            <div class="row mb-2">
                                <div class="col-6 form-group">
                                    <label class=""> Title</label>
                                </div>
                                <div class="col-6 form-group">


                                    <select class="form-control form-control-lg" name="title">
                                        <option selected value=''>select Your Title</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms.">Ms.</option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Prof.">Prof.</option>
                                    </select>

                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-6 form-group">
                                    <label class=""> Gender</label>
                                </div>
                                <div class="col-6 form-group">
                                    <select class="form-control form-control-lg" name="gender">
                                        <option selected value=''>select Your Gender</option>
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
                                <div class="col-6 form-group">
                                    <label class=""> Activity Level</label>
                                </div>
                                <div class="col-6 form-group">
                                    <select class="form-control form-control-lg" name="act_level">
                                        <option selected value='Sedentary'>Sedentary: Little or no exercise</option>
                                        <option value="Light">Light: Exercise 1-3 times/week</option>
                                        <option value="Moderate">Moderate: Exercise 4-5 times/week</option>
                                        <option value="Active">Active: Daily exercise 3-4 times/week</option>
                                        <option value="VeryActive">Very Active: Intense exercise 6-7 times/week </option>
                                        <option value="ExtremelyActive">Extremely Active: Very intense exercise daily, or physical job</option>


                                    </select>
                                </div>
                            </div>




                            <div class="row mb-2">
                                <div class="col-6 form-group">
                                    <label class=""> Date of birth</label>
                                </div>
                                <div class="col-6 form-group">

                                    <input class="form-control" type="date" name="DateOfBirth">
                                </div>
                            </div>




                            <div class="row mb-2">
                                <div class="col-6 form-group" >
                                    <label class=""> Height</label>
                                </div>
                                <div class="col-6 form-group">
                                    <input type="number" class="form-control" placeholder="Your height in CM"
                                        name='height'>
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-6 form-group">
                                    <label class=""> Weight</label>
                                </div>
                                <div class="col-6 form-group">
                                    <input type="number" placeholder="Your weight in Kg" class="form-control"
                                        name="weight">
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-6 form-group">
                                    <label class=""> Neck</label>
                                </div>
                                <div class="col-6 form-group">
                                    <input type="number" placeholder="Your neck in CM" class="form-control" name='neck'>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-6 form-group">
                                    <label class=""> Waist</label>
                                </div> 
                                <div class="col-6 form-group">
                                    <input type="number" placeholder="Your waist in CM" class="form-control" name="waist">
                                </div>
                            </div>

                            <div class="row mb-2 mt-4 form-group">
                                <button type="submit" class="btn btn-dark form-control">Get Started</button>
                            </div>

                            <div class="">

                                <a href="/">Skipping adding details</a>
                            </div>



                        </form>


                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>

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
