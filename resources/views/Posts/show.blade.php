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
    <section>
        <div class="container mt-5" id="loop-comment">

            @forelse($post->PostComment as $comment)
                @if ($comment->is_reply == 0)
                    <div class="card mb-4">
                        <div class="card body ">
                            <div class="row mt-3 mx-2">
                                <p class="small mb-0 ms-2"> {{ $comment->User->name }} at: {{ $comment->created_at }}</p>
                            </div>
                            <div class="d-flex justify-content-between mx-5 mt-4 mb-3">
                                <div class="d-flex flex-row align-items-center ">
                                    <h4>{{ $comment->content }}</h4>
                                </div>
                                <div class="d-flex flex-row align-items-center ml">
                                    @if (isset(Auth::user()->id) && Auth::user()->id == $comment->user_id)

                                        <form action="/comment/{{ $comment->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-body">&larr;delete </button>
                                        </form>


                                        <button type="button" class="btn btn-body "
                                            onclick=" OpenEdit({{ $comment->id }}) ">Edit</button>
                                    @endif
                                    <button type="button" onclick="OpenNewReply({{ $comment->id }})"
                                        class="btn btn-body ">Reply</button>
                                </div>

                            </div>
                            <div class="popUp" style="display:none;" id="EditCommentForm{{ $comment->id }}">

                                <form action="/comment/{{ $comment->id }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <h5>Edit</h5>
                                    </div>
                                    <div class="mb-3 row">
                                        <input type="hidden" class="form-control" name="id" value="{{ $comment->id }}"
                                            id="edit-comment-id-ajax">
                                        <div class="">
                                        
                                            <textarea class="form-control" name="content" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-dark form-control" id="edit-comment-button-ajax"
                                            value="{{ $comment->id }}">Edit Comment</button>
                                    </div>
                                </form>

                            </div>
                            <div class="popUp" style="display:none;" id="AddReplyForm{{ $comment->id }}">

                                <form action="/comment" method="POST">
                                    @csrf
                                    <div class="row">
                                        <h5>Reply</h5>
                                    </div>
                                    <div class="mb-3 row">
                                        <input type="hidden"  name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" name="replies_id" value="{{ $comment->id }}">
                                        <input type="hidden" name="is_reply" value='1'>
                                        <div class="">
                                            <textarea class="form-control" name="content" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-dark form-control add-reply-button-ajax">Reply
                                            Comment</button>
                                    </div>
                                </form>

                            </div>
                            <div class="row mt-2 mb-2 mx-2">
                                <div class="d-flex flex-row align-items-left ">
                                    <button type="button" onclick="ShowReply({{ $comment->id }})"
                                        class="btn btn-body "> Show Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                
                <div class="nested-reply" style="display:none;" id="ShowReply{{$comment->id}}">
                @forelse(($comment->getreplies($comment->id)) as $reply)
                    
                    <!----There is a reply and display-->
                    <div class="card mb-4 mx-5">
                        <div class="card body ">
                            <div class="row mt-3 mx-2">
                                <p class="small mb-0 ms-2"> {{ $reply->User->name }} at: {{ $reply->created_at }}</p>
                            </div>
                            <div class="d-flex justify-content-between mx-5 mt-4 mb-3">
                                <div class="d-flex flex-row align-items-center ">
                                    <h4>{{ $reply->content }}</h4>
                                </div>
                                <div class="d-flex flex-row align-items-center ml">
                                    @if (isset(Auth::user()->id) && Auth::user()->id == $reply->user_id)
                                        <button class="btn btn-body delete-comment-button-ajax"
                                            value="{{ $reply->id }}">&larr;delete </button>
                                        <button type="button" class="btn btn-body "
                                            onclick=" OpenEdit({{ $reply->id }}) ">Edit</button>
                                    @endif
                                </div>
                            
                            </div>
                        
                    </div>
                    </div>
                    
                @empty
                
                    <!----There is not reply-->
                    <div class="card mb-4 mx-5">
                        <div class="card body "> 
                            <div class="d-flex justify-content-between mx-5 mt-4 mb-1">
                                <div class="d-flex flex-row align-items-center ">
                                    <p>There is no reply for this comment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                </div>
                    
                

            @empty

                <div class="card mb-4 mx-5" id='NoComment'>
                        <div class="card body "> 
                            <div class="d-flex justify-content-between mx-5 mt-4 mb-1">
                                <div class="d-flex flex-row align-items-center ">
                                    <p>There is no comment on this post </p>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforelse
            


        </div>
    </section>

    <!--    Add comment  ---->
    <section>
        <div class="container justify-content-center">
            <div class="row">
                <div class="col"></div>
                <div class="col text-center">
                    <h5>
                        Add Comment
                    </h5>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <form action="/comment" method="POST">
                        @csrf

                        <div class="mb-3 row">
                            <input type="hidden"  name="post_id" id="add-comment-user-id-ajax"
                                value="{{ $post->id }}">
                            <input type="hidden" name="is_reply" value='0'>
                            <textarea class="form-control" name="content" rows="5" id="add-comment-ajax"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-dark form-control"
                                id="add-comment-button-ajax">Comment</button>
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
                <div class="col"></div>
            </div>
        </div>
    </section>



    
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
