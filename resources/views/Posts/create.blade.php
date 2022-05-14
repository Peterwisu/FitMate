@extends('layouts.app')


@section('content')



    <div class="container"><br>
        <div class="heder_forum mb-5">

            <h1 class="header_forum" >Add a post</h1>

        </div>
        
        <div class=" ">

            
                <form action="/posts" method="POST">
                    @csrf

                  
                        <div class="mt-4 mb-4">
                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Post title">
                        </div>
                 
                    
                    <div class="mt-4 mb-4">

                       <!--- <input type="text" class="form-control" id="inputContent" name="content"> ---->
                        <textarea class="form-control" id="inputContent" name="content" rows="8" placeholder="Post content"></textarea>
                    </div>

                    <div class="row">
                        <div class="mt-2 mb-4" style="width: 104px;
                    height: 50px;">
                        <button type="submit" class="btn btn-dark form-control" style="font-weight: 500;
                        width: 104px;
height: 50px;font-size: 16px;">Submit</button>
                    </div>
                    </div>
                    
                </form>


                <div class=" mt-5" role="alert" id='error'>
                    @if ($errors->any())
                            @foreach ($errors->all() as $err)
                                <div class="alert alert-danger mt-2" role="alert">
                                    <li> {{ $err }}</li>
                                </div>
                            @endforeach
                    @endif
                </div>
           



        </div>

    </div>






@endsection
