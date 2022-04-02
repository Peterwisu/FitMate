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
                                <div class="col-6">
                                    <label class=""> Name</label>
                                </div>
                                <div class="col-6">
                                    <label class=""> {{Auth::user()->name}}</label>
                                </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class=""> Name</label>
                            </div>
                            <div class="col-6">
                                <label class=""> {{Auth::user()->email}}</label>
                            </div>
                        </div>




                        <form action="/profile" method="POST">
                            @csrf

                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class=""> Title</label>
                                </div>
                                <div class="col-6">
                                    

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
                                <div class="col-6">
                                    <label class=""> Gender</label>
                                </div>
                                <div class="col-6">
                                    <select class="form-control form-control-lg" name="gender">
                                        <option selected value='' >select Your Gender</option>    
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    
                                    </select>
                                </div>
                            </div>




                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class=""> Date of birth</label>
                                </div>
                                <div class="col-6">
                           
                                    <input  class="form-control"type="date" name="DOB">
                                </div>
                            </div>




                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class=""> Height</label>
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control" placeholder="Your height in CM" name='height'>
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class=""> Weight</label>
                                </div>
                                <div class="col-6">
                                    <input type="number" placeholder="Your weight in Kg" class="form-control" name="weight">
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class=""> Neck</label>
                                </div>
                                <div class="col-6">
                                    <input type="number" placeholder="Your neck in CM" class="form-control" name='neck'>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class=""> Waist</label>
                                </div>
                                <div class="col-6">
                                    <input type="number" placeholder="Your waist in CM"class="form-control" name="waist">
                                </div>
                            </div>

                            <div class="row mb-2 mt-4">
                                <button type="submit" class="btn btn-dark form-control">Submit</button>
                            </div>





                        </form>


                    </div>
                    <div class="col-md-2"></div>
                    <div>



                    </div>
                @endsection
