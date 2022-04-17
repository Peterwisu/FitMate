@extends('layouts.app')


@section('content')



    <div class="container"><br>
        <h1 class="position-absolute bottom-40 start-50 translate-middle-x">Post Create</h1>

        <br>

        <br>
        <br>
        <hr>
        <br>



        <br>
        <br>
        <div class="row justify-content-center text-center">

            <div class="col-4">
                <form action="/posts" method="POST">
                    @csrf

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" name="name">
                        </div>
                    </div>
                    <div class="mb-3 row ">
                        <label class="col-sm-2 col-form-label ">Content</label>

                    </div>
                    <div class="mb-3 row">

                       <!--- <input type="text" class="form-control" id="inputContent" name="content"> ---->
                        <textarea class="form-control" id="inputContent" name="content" rows="3"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-dark form-control">Submit</button>
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

    </div>






@endsection
