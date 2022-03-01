@extends('layouts.app')


@section('content')
    <div class="container mb-5 mt-5">
        <div class="row justify-content-center">

            <div class="row text-center">

                <h1 class="">Forum</h1>

            </div>
            <div class="row">
                @if (Auth::user())
                <div class="col-md-8">

                    <button type="button" class="btn btn-secondary">
                        <a href="posts/create" style="color: aliceblue">
                            Add New Post
                        </a>
                    </button>
                </div>
                @endif
            </div>

            <div class="col-md-8 mt-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ante in nibh mauris cursus mattis. Ac odio tempor orci dapibus ultrices in iaculis
                nunc. Augue ut lectus arcu bibendum at. Dui ut ornare lectus sit amet.
            </div>

            <hr class='mt-5'>
            
            <div class="col-md-8 mt-5">





                @forelse($posts as $post)
                    <h2>
                        <a href="/posts/{{ $post->id }}">


                            {{ $post->name }}

                        </a>

                    </h2>
                    <p>
                        {{ $post->content }}
                    </p>




                    <hr>
                @empty

                    <h3>
                        No post
                    </h3>
                @endforelse


            </div>
        </div>
    </div>
@endsection
