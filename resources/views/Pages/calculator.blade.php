@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row mt-3 mb-4">
            <div class="col">
                <h1>FitMate  Fitness Calculator</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>
                    Calculate Your Fitness Level
                </h3>
                <p>
                    See how fit you are and what to improve by giving us your measurements or connecting to our most use fitness app
                </p>
            </div>
        </div>
        <form id="vali">
            <div class="row mt-2 mb-2">
              <div class="col-md-6">
                <label>Year of Birth</label>
                <input class="form-control" type="date" name="DateOfBirth" id="DOB" required>
                
              </div>
              <div class="col-md-6">
                <label>Height</label>
                <input type="number" class="form-control" placeholder="Your height in CM"
                name='height' id='height' required>
            </div>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-md-6">
                  <label>Gender</label>
                  <select class="form-control form-control-lg" name="gender" id='gender' required>
                    <option selected value=''>select Your Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="non-Binary">Non-binary/non-conforming</option>
                    <option value="transgender">Transgender</option>
                    <option value="others">Other</option>
                    <option value="prefer_not_tosay">Prefer not to say</option>
                    


                </select>
                  
                </div>
                <div class="col-md-6">
                  <label>Neck</label>
                  <input type="number" placeholder="Your neck in CM" class="form-control" name='neck' id='neck' required>
                </div>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-md-6">
                    <label>Activity Level</label>
                    <select class="form-control form-control-lg" name="act_level" id='act_level' required>
                        <option value=''>Please Select one</option>
                        <option value='Sedentary'>Sedentary: Little or no exercise</option>
                        <option value="Light">Light: Exercise 1-3 times/week</option>
                        <option value="Moderate">Moderate: Exercise 4-5 times/week</option>
                        <option value="Active">Active: Daily exercise 3-4 times/week</option>
                        <option value="VeryActive">Very Active: Intense exercise 6-7 times/week </option>
                        <option value="ExtremelyActive">Extremely Active: Very intense exercise daily, or physical job</option>


                    </select>
                  
                </div>
                <div class="col-md-6">
                    <label>Waist</label>
                    <input type="number" placeholder="Your waist in CM" class="form-control" name="waist" id="waist" required>
                </div>
            </div>
            <div class="row mt-2 mb-2">
                <div class="col-md-6">
                  <button class="btn btn-secondary"> Connect to Fitness API </button>
                  
                </div>
                <div class="col-md-6">
                    <label>Weight</label>
                    <input type="number" placeholder="Your weight in Kg" class="form-control"
                                        name="weight" id="weight" required>
                </div>
            </div>
            <div class="row  mt-5 mb-5">
                <div class="col-md-12 ">
                    <button class="btn btn-primary" id="calculate"> Calculate !</button>
                </div>
            </div>
        </form>

        <div class="row">


            <div class="col-md-6">
                
                <div class="row mt-3 mb-3">
                    <h4>
                        Result
                    </h4>
                </div>

                <div class="row mt-1 mb-1" id="table">
                    <div class="col-md-7">
                        <p>Body Fat</p>
                    </div>
                    <div class="col-md-5" id="BodyFat">

                    </div>
                </div>

                <div class="row mt-1 mb-1" id="table">
                    <div class="col-md-7">
                        <p>Body Fat Mass</p>
                    </div>
                    <div class="col-md-5" id="BodyFatMass">

                    </div>
                </div>

                <div class="row mt-1 mb-1" id="table">
                    <div class="col-md-7">
                        <p>Lean Body Mass</p>
                    </div>
                    <div class="col-md-5" id="LeanBodyFat">

                    </div>
                </div>

                <!---
                <div class="row mt-1 mb-1" id="table">
                    <div class="col-md-7">
                        <p>Ideal Weight</p>
                    </div>
                    <div class="col-md-5" id="IdealBodyFat">

                    </div>
                </div>
            -->


                <div class="row mt-1 mb-1" id="table">
                    <div class="col-md-7">
                        <p>BMI</p> 
                    </div>
                    <div class="col-md-5" id="BMI">

                    </div>
                </div>


                <div class="row mt-1 mb-1" id="table">
                    <div class="col-md-7">
                        <p>BMR</p>
                    </div>
                    <div class="col-md-5" id="BMR">

                    </div>
                </div>


                <!------
                <div class="row mt-1 mb-1" id="table">
                    <div class="col-md-7">
                        <p>Calories for Weight loss</p>
                    </div>
                    <div class="col-md-5" id="Calo_WL">

                    </div>
                </div>


                <div class="row mt-1 mb-1" id="table">
                    <div class="col-md-7">
                        <p>Calories for Maintenance</p>
                    </div>
                    <div class="col-md-5" id="Calo_MT">

                    </div>
                </div>


                <div class="row mt-1 mb-1" id="table">
                    <div class="col-md-7">
                        <p>Calores for Weight Gain</p>
                    </div>
                    <div class="col-md-5" id="Calo_WG">

                    </div>
                </div>
            -->


            </div>
            <div class="col-md-6">

                <div class="row mt-2 mb-5" id="health_status">

                  

                </div>

                <div class="row mt-2 mb-2">

                    <ul>
                        <li>
                            Healthy BMI range: 18.5 kg/m2 - 25 kg/m2
                        </li>
                        <li>
                            Healthy weight for the height: 59.9 kgs - 81.0 kgs
                        </li>
                    </ul>
                </div>

                <div class="row mt-2 mb-2">


                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tincidunt laoreet vitae aliquam. Dui odio orci senectus orci, tristique nulla augue. Magna at mi malesuada viverra ut. Pretium rhoncus, massa montes, lacus, senectus consectetur. Facilisis
                </div>



            </div>






        </div>







    </div>

    <script  type="text/javascript" src="{{asset('js/calculator.js')}}"></script>
@endsection