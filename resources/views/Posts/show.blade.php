@extends('layouts.app')

@section('content')

    
    <!------Post Section--->
    <section>
        <div class="container postsection" id="post_{{ $post->id }}">
            <div class="row mt-5">
                <div class="col-md-3"></div>
                <div class="col-md-6 d-flex align-content-center justify-content-center">
                    <div class="">
                        <h1 class='text-center'>
                            {{ $post->name }}
                        </h1>
                        <div class="mt-3 d-block mx-auto bg-dark rounded-circle" style="height: 50px; width: 50px;">


                        </div>
                        <div class="mt-3 d-block mx-auto d-flex align-content-center justify-content-center flex-column"
                            style="height: 50px; width: 50px;">


                        </div>
                        <h4 class="text-center mt-2">
                            {{ $post->User->name }}
                        </h4>
                        <p class="text-center">
                            at: {{ $post->created_at }}
                        </p>


                    </div>


                </div>
                <div class="col-md-3"></div>

            </div>
            <div class="row mt-5">

                <h2>
                    {{ $post->content }}
                </h2>
            </div>
            <div class="row">
                <!------ If user login and if user id is sam as a user_id in post show content---->
                @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                    <div class="col">
                        <a href="/posts/{{ $post->id }}/edit">
                            Edit {{ $post->name }} &rarr;
                        </a>
                        <form action="/posts/{{ $post->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger ">Delete &rarr;</button>
                        </form>
                @endif
            </div>
        </div>
    </section>

    <!--- Loop Through comment--->
    @include('posts.partials.comment')
    <!--    Add comment  ---->
    @include('posts.partials.add')



    
    <script>
        //show form for editing comment in web pages
        function OpenEdit(id) {
            $("#EditCommentForm" + id).toggle();
        }
        //show form for creating reply in web pages
        function OpenNewReply(id) {
            $("#AddReplyForm" + id).toggle();
        }
        //show form for editing reply in web pages
        function ReplyEdit(id) {
            $("#EditReply" + id).toggle();
        }
        function ShowReply(id) {
            
            $("#ShowReply" + id).toggle();
            
        }
    </script>
    <script>
        $(document).ready(function() {
            const post_id = {{ $post->id }};
            const url = document.querySelector('meta[name="base_url"]').content
            const csrf_token = document.querySelector('meta[name="csrf-token"]').content
            $('#add-comment-button-ajax').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: `/comment`,
                    method: "POST",
                    dataType: "json",
                    headers: {
                        'X-CSRF-Token': csrf_token
                    },
                    data: {
                        content: $('#add-comment-ajax').val(),
                        is_reply: 0,
                        post_id: post_id,
                        _token: csrf_token

                    },
                    error: function(xhr, textStatus, thrownError) {
                        console.log(xhr)
                        console.log(textStatus)
                        console.log(thrownError)
                    },
                    success: function(r) {
                        console.log('Ajax add comment success');
                        $('#NoComment').remove();
                        
                        $("#loop-comment").append(`
                        <div class="card mb-4">
                            <div class="card body ">
                                <div class="row mt-3 mx-2">
                                    <p class="small mb-0 ms-2"> ${r.username} at: ${r.create_at}</p>
                                </div>
                                <div class="d-flex justify-content-between mx-5 mt-4 mb-3">
                                    <div class="d-flex flex-row align-items-center ">
                                        <p>${r.content}</p>
                                    </div>
                                    <div class="d-flex flex-row align-items-center ml">
                                        <button class="btn btn-body delete-comment-button-ajax" value="${r.id}">&larr;delete </button>
                                        <button type="button" class="btn btn-body "onclick=" OpenEdit(${r.id}) ">Edit</button>
                                        <button type="button" onclick="OpenNewReply(${r.id})"class="btn btn-body ">Reply</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                        `)
                    }
                })
            });

        })
    </script>
@endsection
