@extends('layouts.app')


@section('content')



    <div class="container"><br>
        <div class="heder_forum mb-5">

            <h1 class="header_forum" >Edit a post</h1>

        </div>
        <div class="">

            
                <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                        <div class="mt-4 mb-4">
                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Post title"value="{{ $post->name }}">
                        </div>
                    
                    
                    <div class="mt-4 mb-4">

                    
                            <textarea class="form-control" id="inputContent" name="content" rows="8" placeholder="Post content"value="{{ $post->content }}">{{ $post->content }}</textarea>
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






@endsection
