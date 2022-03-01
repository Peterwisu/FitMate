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
                <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" name="name" value="{{ $post->name }}">
                        </div>
                    </div>
                    <div class="mb-3 row ">
                        <label class="col-sm-2 col-form-label ">Content</label>

                    </div>
                    <div class="mb-3 row">

                        <input type="text" class="form-control" id="inputContent" name="content"
                            value="{{ $post->content }}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-dark form-control">Submit</button>
                    </div>
                </form>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                @endif
            </div>



        </div>

    </div>






@endsection
