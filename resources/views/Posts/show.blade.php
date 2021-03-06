@extends('layouts.app')

@section('content')
    <!------Post Section--->
    <section>
        <div class="container mb-5 mt-5 postsection" id="post_{{ $post->id }}">

            <div class="row mb-4 mt-4">
                <div class="col-md-10">
                    <h1 class="header_forum">{{ $post->name }}</h1>
                </div>
                <div class="col-md-2">
                    {{$post->created_at}}
                    
                </div>
            </div>

            <div class="row mt-4 mb-5">
                <div class=" col-md-10 forum_text">
                    {{ $post->User->name }}
                </div>

                <!------ If user login and if user id is same as a user_id in post show content---->
                @if (auth()->check() && Auth::user()->id == $post->user_id)
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-body">
                            <a href="/posts/{{ $post->id }}/edit" style="color: rgb(0, 0, 0)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                    <path
                                        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                </svg>Edit
                            </a>
                        </button>

                    </div>
                    <div class="col-md-1">


                        <form action="/posts/{{ $post->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-body "> <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg>Delete </button>
                        </form>
                    </div>
                @endif

            </div>

            <div class="mt-5 mb-5">
                <div class="post_detail">
                    {{ $post->content }}
                </div>
            </div>
            <hr>
        </div>
    </section>



    <!--- Loop Through comment--->
    <section>




        <div class="container mt-5" id="loop-comment">
            <div class="mt-5 mb-5">
                <p class="forum_all_post">Comments</p>
            </div>
    
    
    
            @forelse($post->PostComment as $comment)
                <!----Check if the comment is not replies (0 means is not reply ) --->
                @if ($comment->is_reply == 0)
                    <div class="card  mb-4"style="border: 0px ;background: #F9FAFB;">
                        <div class="card body " style="border: 0px;background: #F9FAFB;">
                            <div class="row mt-3 mx-2">
                                <div class="col-md-11">
                                    <p class="post_author"> {{ $comment->User->name }} </p>
                                </div>
                                <div class="col-md-1">
                                    @if (date_diff(date_create($comment->created_at), date_create(date('Y-m-d')))->format('%d') == 0)
                                        Today
                                    @else
                                        {{ date_diff(date_create($comment->created_at), date_create(date('Y-m-d')))->format('%d') }}d
                                        ago
                                    @endif
    
                                </div>
    
                            </div>
    
                            <div class="row mt-3 mx-2">
                                <div class="col-md-9">
                                    <p class="post_content">
                                        {{ $comment->content }}</p>
                                </div>
    
    
                                <!------ If user login and if user id is same as a user_id in comment show content ---->
                                @if (auth()->check() && Auth::user()->id == $comment->user_id)
                                    <!----form for delete comment --->
                                    <div class="col-md-1  text-center">
                                        <form action="/comment/{{ $comment->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-body  " > <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                </svg>Delete </button>
                                        </form>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <!----Button toggle form for Edit comment --->
                                        <button type="button" class="btn btn-body "
                                            onclick=" OpenEdit({{ $comment->id }}) "><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                                <path
                                                    d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                            </svg><br>Edit</button>
                                    </div>
                                @endif
                                <!--- if user is login show reply button ---->
                                @if (auth()->check())
                                    <div class="col-md-1  text-center">
                                        <!----Button toggle form for Add reply to comment --->
                                        <button type="button" onclick="OpenNewReply({{ $comment->id }})"
                                            class="btn btn-body "><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-chat-left-dots-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                            </svg><br>Reply</button>
                                    </div>
                                @endif
    
    
    
                            </div>
    
    
    
                            <!----form for Edit comment --->
                            <div class="popUp hidden"  id="EditCommentForm{{ $comment->id }}">
                                <div class="mx-3 mt-5 mb-5">
                                    <form action="/comment/{{ $comment->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
    
    
    
                                        <input type="hidden" class="form-control" name="id" value="{{ $comment->id }}"
                                            id="edit-comment-id-ajax">
                                        <div class="mt-2 mb-2">
    
                                            <textarea class="form-control" name="content" rows="4" placeholder="Edit your comment"></textarea>
                                        </div>
    
                                        <div>
                                            <button type="submit" class="btn btn-dark form-control"
                                                id="edit-comment-button-ajax" value="{{ $comment->id }}" >Edit
                                                Comment</button>
                                        </div>
                                    </form>
                                </div>
    
                            </div>
                            <!----form for adding reply --->
                            <div class="popUp hidden"  id="AddReplyForm{{ $comment->id }}">
                                <div class="mx-3 mt-5 mb-5">
                                    <form action="/comment" method="POST">
                                        @csrf
    
    
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" name="replies_id" value="{{ $comment->id }}">
                                        <input type="hidden" name="is_reply" value='1'>
                                        <div class="mt-2 mb-2">
                                            <textarea class="form-control" name="content" rows="4" placeholder="Reply this comment"></textarea>
                                        </div>
    
                                        <div>
                                            <button type="submit"
                                                class="btn btn-dark form-control add-reply-button-ajax">Reply
                                                Comment</button>
                                        </div>
                                    </form>
                                </div>
    
                            </div>
                            <!----Button to toggle gide and show replies of a comment  ----->
    
                            <div class=" mx-2 mb-2">
                                <button type="button" onclick="ShowReply({{ $comment->id }})" class="btn btn-body ">
                                    <p class="post_content"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                                      </svg> Show Reply</p>
                                </button>
                            </div>
    
                        </div>
                        <hr>
                    </div>
                @endif
    
                <!---- div that will get toggle show and hide replies of comment-->
                <div class="nested-reply" style="display:none;" id="ShowReply{{ $comment->id }}">
                    <!---  Run loop to all reply that belong to this comment id --->
                    @forelse(($comment->getreplies($comment->id)) as $reply)
                        <!----There is a reply and display-->
                        <div class="row">
                            <div class="col-md-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                                  </svg>
                            </div>
                            <div class="card mb-4 col-md-11" style="border: 0px;background: #F9FAFB;">
                                <div class="card body " style="border: 0px;background: #F9FAFB;">
                                    <div class="row mt-3 mx-2">
                                        <div class="col-md-11">
                                            <p class="post_author"> {{ $reply->User->name }} </p>
                                        </div>
                                        <div class="col-md-1">
                                            @if (date_diff(date_create($reply->created_at), date_create(date('Y-m-d')))->format('%d') == 0)
                                                Today
                                            @else
                                                {{ date_diff(date_create($reply->created_at), date_create(date('Y-m-d')))->format('%d') }}d
                                                ago
                                            @endif
    
                                        </div>
                                    </div>
    
                                    <div class="row mt-3 mx-2 mb-3">
                                        <div class="col-md-10">
                                            <p class="post_content">
                                                {{ $reply->content }}</p>
                                        </div>
    
                                        <!------ If user login and if user id is same as a user_id in reply show content---->
                                        @if (auth()->check() && Auth::user()->id == $reply->user_id)
                                            <div class="col-md-1">
                                                <form action="/comment/{{ $reply->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-body"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                        </svg>Delete </button>
                                                </form>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-body "
                                                    onclick=" ReplyEdit({{ $reply->id }}) "><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                                        <path
                                                            d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                                    </svg><br>Edit</button>
                                            </div>
                                        @endif
    
    
                                    </div>
                                    <!----form for Edit Reply --->
                                    <div class="popUp" style="display:none;" id="EditReplyForm{{ $reply->id }}">
                                        <div class="mx-3 mt-3 mb-5">
                                            <form action="/comment/{{ $reply->id }}" method="POST">
                                                @csrf
                                                @method('PUT')
    
    
    
                                                <input type="hidden" class="form-control" name="id"
                                                    value="{{ $reply->id }}">
                                                <div class="mt-2 mb-2">
    
                                                    <textarea class="form-control" name="content" rows="4" placeholder="Edit your reply"></textarea>
                                                </div>
    
                                                <div>
                                                    <button type="submit" class="btn btn-dark form-control"
                                                        value="{{ $reply->id }}">Edit Comment</button>
                                                </div>
                                            </form>
                                        </div>
    
                                    </div>
                                    <div class="row mt-3 mx-2">
                                        <hr>
                                    </div>
                                </div>
    
                            </div>
                        </div>
    
    
    
                    @empty
    
                        <!----There is no reply-->
                        <div class="card mb-4 " style="margin-left: 75px !important; border: 0px;background: #F9FAFB;" >
                            <div class="card body " style="border: 0px;background: #F9FAFB;">
                                <div class="d-flex justify-content-between mx-5 mt-4 mb-1">
                                    <div class="d-flex flex-row align-items-center ">
                                        <p class="post_detail">There is no reply for this comment</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
    
    
    
            @empty
                <!----There is no comment-->
                <div class="card mb-5 mt-5" id='NoComment' style="border: 0px;background: #F9FAFB;">
                    <div class="card body " style="border: 0px;background: #F9FAFB;">
                        <div class="d-flex justify-content-between mx-5 mt-5 mb-4">
    
                            <p class="post_detail"> There is no comment on this post </p>
    
                        </div>
                    </div>
                </div>
            @endforelse
    
    
    
        </div>
    </section>
    
    <!--    Add comment  ---->
    
<section>
    @if (auth()->check())
        <div class="container justify-content-center">



            <form action="/comment" method="POST">
                @csrf
                <div class="mb-3 ">
                    <input type="hidden" name="post_id" id="add-comment-user-id-ajax" value="{{ $post->id }}">
                    <input type="hidden" name="is_reply" value='0'>
                    <textarea class="form-control" name="content" rows="6" id="add-comment-ajax" placeholder="Comment content"></textarea>
                </div>


                <div class="mt-5 mb-5 d-flex alogn-itmes-center justify-content-center">
                
                    <button type="submit" class="btn btn-dark form-control" id="add-comment-button-ajax" style="width: 175px;
                    height: 50px;"> Add a comment</button>
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
    @else
        <div class="container justify-content-center">
            <div class="row  ">
                <div class="col"></div>
                <div class="col text-center mt-3">
                    <h5>
                        Please login to add commment
                    </h5>
                </div>
                <div class="col"></div>
            </div>
        </div>
    @endif
</section>

    <!---- display error message from server side validation --->




    <script>
       //show form for editing comment in web pages
       function OpenEdit(id) {
            console.log('toggle');
            if ($("#EditCommentForm" + id).hasClass('hidden')){
                $("#AddReplyForm" + id).addClass('hidden');
                $("#EditCommentForm" + id).removeClass('hidden');
            }else{
                $("#EditCommentForm" + id).addClass('hidden');
               
            }
            

        }
        //show form for creating reply in web pages
        function OpenNewReply(id) {
            console.log('toggle')
            
            if ($("#AddReplyForm" + id).hasClass('hidden')){
                $("#EditCommentForm" + id).addClass('hidden');
                $("#AddReplyForm" + id).removeClass('hidden');
            }else{
                $("#AddReplyForm" + id).addClass('hidden');
               
            }
           
        }
        //show form for editing reply in web pages
        function ReplyEdit(id) {
            $("#EditReplyForm" + id).toggle();
        }

        function ShowReply(id) {

            $("#ShowReply" + id).toggle();

        }
    </script>
    <script>
        $(document).ready(function() {

            const post_id = {{ $post->id }};
            // get URL of cuurent web page
            const url = document.querySelector('meta[name="base_url"]').content
            // get crsf_toke
            const csrf_token = document.querySelector('meta[name="csrf-token"]').content
            $('#add-comment-button-ajax').click(function(e) {

                // prevent web page refresh
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
                        $("#error").append(`
                        
                        <div class="alert alert-danger mt-2" role="alert">
                            <li> ${xhr.responseJSON.message}</li>
                        </div>
                        
                        
                        `)
                    },
                    success: function(r) {
                        console.log('Ajax add comment success');
                        console.log(r)
                        $('#NoComment').remove();
                        // Remove a div containig message no comment for post
                        $('#error').remove();
                        // Append New comment
                        $("#loop-comment").append(`
                        <div class="card mb-4" style="border: 0px;background: #F9FAFB;">
                            <div class="card body " style="border: 0px;background: #F9FAFB;">
                                <div class="row mt-3 mx-2">
                                    <div class="col-md-11">
                                        <p class="post_author"> ${r.username}</p>
                                    </div>   
                                    <div class="col-md-1">
                                        Just Now
                                    </div>
                                </div>
                                

                            
                                <div class="row mt-3 mx-2 mb-5">
                                    <div class="col-md-9">
                                        <p class="post_content" >${r.content}</p>
                                    </div>

                                    <div class="col-md-1  text-center">
                                        <form action="/comment/${r.id}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-body"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg>Delete </button>
                                        </form>
                                    </div>

                                    <div class="col-md-1  text-center">
                                        <button type="button" class="btn btn-body "onclick=" OpenEdit(${r.id}) "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                        <path
                                            d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                    </svg><br>Edit</button>
                                    </div>

                                    <div class="col-md-1  text-center">
                                        <button type="button" onclick="OpenNewReply(${r.id})"class="btn btn-body "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
                                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                          </svg><br>Reply</button>
                                    </div>
                                        
                                        
                                    

                                </div>
                                <!----form for Edit comment --->
                        <div class="popUp hidden"  id="EditCommentForm${r.id}">
                            <div class="mx-3 mt-3 mb-5">
                            <form action="/comment/${r.id}" method="POST">
                                @csrf
                                @method('PUT')

                                
                                
                                    <input type="hidden" class="form-control" name="id" value="${r.id}"
                                        id="edit-comment-id-ajax">
                                    <div class="mt-2 mb-2">

                                        <textarea class="form-control" name="content" rows="4" placeholder="Edit your comment"></textarea>
                                    </div>
                                
                                <div>
                                    <button type="submit" class="btn btn-dark form-control"
                                        id="edit-comment-button-ajax" value="${r.id}">Edit Comment</button>
                                </div>
                            </form>
                        </div>

                        </div>
                        <!----form for adding reply --->
                        <div class="popUp hidden" id="AddReplyForm${r.id}">
                            <div class="mx-3 mt-3 mb-5">
                            <form action="/comment" method="POST">
                                @csrf
                                
                                
                                    <input type="hidden" name="post_id" value="${r.post_id}">
                                    <input type="hidden" name="replies_id" value="${r.id}">
                                    <input type="hidden" name="is_reply" value='1'>
                                    <div class="mt-2 mb-2">
                                        <textarea class="form-control" name="content" rows="4" placeholder="Reply this comment"></textarea>
                                    </div>
                                
                                <div>
                                    <button type="submit" class="btn btn-dark form-control add-reply-button-ajax">Reply
                                        Comment</button>
                                </div>
                            </form>
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
