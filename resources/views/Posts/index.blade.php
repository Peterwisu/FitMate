@extends('layouts.app')


@section('content')
    <div class="container mb-5 mt-5">
        <div class=" justify-content-center">

            <div class="">

                <p class="header_forum">FitMate Fitness Forum</p>

            </div>


            <div class="mt-5 ">
                <p class="forum_text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ante in nibh mauris cursus mattis. Ac odio tempor orci dapibus ultrices in iaculis
                    nunc. Augue ut lectus arcu bibendum at. Dui ut ornare lectus sit amet.
                </p>
            </div>


            <div class="mt-5 mb-5 d-flex alogn-itmes-center justify-content-center">
                @if (auth()->check())
                    <div class="">

                        <button type="button" class="btn btn-dark " style="width: 175px;
                        height: 50px;">
                            <a href="/posts/create" style="color: aliceblue">
                                Add a post
                            </a>
                        </button>
                    </div>
                @endif
            </div>


            <p class="forum_all_post">All posts</p>
            <div class=" mt-5">





                @forelse($posts as $post)
                    <div class=" row mt-4">
                        <div class="col-md-11 ">
                            <a href="/posts/{{ $post->id }}">

                                <p class='post_author'>

                                    {{ $post->User->name }}


                                </p>
                                

                            </a>
                        </div>
                        <div class="col-md-1">
                            @if (date_diff(date_create($post->created_at), date_create(date('Y-m-d')))->format('%d') == 0)
                                Today
                            @else
                                {{ date_diff(date_create($post->created_at), date_create(date('Y-m-d')))->format('%d') }}d
                                ago
                            @endif

                        </div>






                        
                    </div>

                    <div class="">
                        <a href="/posts/{{ $post->id }}">

            
                            <p class="post_name">
                                {{ $post->name }}
                            </p>
                            <p class="post_content">
                                {{ $post->content }}
                            </p>

                        </a>
                    </div>
                    <hr>
                @empty
                    <hr>
                    <div class="forum_text">
                        <p>
                            No post
                        <p>
                    </div>
                    
                @endforelse


            </div>
        </div>
    </div>
@endsection
