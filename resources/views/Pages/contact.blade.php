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
                     
                        
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Details</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                          <div class="row justify-content-center">
                            <div class="col-md-8 text-center ">
                                <button type="button" class="btn btn-secondary ">Submit</button>
                            </div>
                          </div>
                         






                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
