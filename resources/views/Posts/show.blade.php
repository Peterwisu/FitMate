@extends('layouts.app')


@section('content')
    <div class="container">
        <br>

        <br>
        <h1 class="position-absolute bottom-40 start-50 translate-middle-x">
            {{ $post->name/* show name of the post*/ }}</h1>
        <br>
        <br>
        <br>
        <h3>{{$post->User->name /* show name of the user who post*/}}</h3>
        <p> at: {{$post->created_at/* show time of the post create*/}}</p>
        <div class="row">
            <!------ If user login and if user id is sam as a user_id in post show content---->
            @if(isset(Auth::user()->id)&&Auth::user()->id == $post->user_id)
            <div class="col">
                <a href="/posts/{{ $post->id }}/edit">
                    Edit {{ $post->name }} &rarr;
                </a>
                <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger ">Delete &rarr;</button>
                </form>
            </div>
            @endif
            <div class="col">
            </div>

        </div>
        <br>

        <div class='align-self-center'>
            <div class="col">
            </div>
            <div class="col">
                <p>
                    Content:
                </p>

                <h5>
                    {{ $post->content }}
                </h5>
            </div>
            <div class="col">
            </div>

        </div>


        <br>
        <br>
        <br>


    </div>


    <div class="container">
        <hr>
        <h3>
            Comment
        </h3>
        <hr>




        @forelse ($post->PostComment as $comment /* Loop through all comment*/)
            <div class="card mb-4">

                <div class="card-body">

                    <p class="small mb-0 ms-2"> {{$comment->User->name}} at: {{ $comment->created_at }}</p>

                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">

                            
                                <p>{{ $comment->content }}</p>
                        </div>

                        <div class="d-flex flex-row align-items-center">
                            @if(isset(Auth::user()->id)&&Auth::user()->id == $comment->user_id/* If user login and if user_id is sam as a user_id in commnet show content*/)
                            <form action="/comment/{{ $comment->id }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-body "> &larr;delete </button>
                            </form>


                            <button type="button" class="btn btn-body "
                                onclick=" OpenEdit({{ $comment->id}}) ">Edit</button>




                            @endif
                            <button type="button" onclick="OpenNewReply({{$comment->id}})" class="btn btn-body ">Reply</button>

                        </div>
                        
                    </div>
                    <div class="popUp" style="display:none;" id="EditCommentForm{{$comment->id}}">
                    
                        <form action="/comment/{{$comment->id}}" method="POST" >
                            @csrf
                            @method('PUT')
             
                            <div class="row">
                                <h5>Edit</h5> 
                            </div>
                            <div class="mb-3 row">
                                <input type="hidden" class="form-control"  name="id" value="{{$comment->id}}">
                                
                                <textarea class="form-control"  name="content" rows="5"></textarea>
                            </div>
                            <div >
                                <button type="submit" class="btn btn-dark form-control" >Edit Comment</button>
                            </div>  
                        </form>
                    
                    </div>
                    <div class="popUp" style="display:none;" id="AddReplyForm{{$comment->id}}">
                    
                        <form action="/replies" method="POST" >
                            @csrf
             
                            <div class="row">
                                
                                <h5>Reply</h5> 
                                
                            </div>
                            <div class="mb-3 row">
                                <input type="hidden" class="form-control"  name="comment_id" value="{{$comment->id}}">
                                <textarea class="form-control"  name="content" rows="5"></textarea>
                            </div>
                            <div >
                                <button type="submit" class="btn btn-dark form-control" >Reply Comment</button>
                            </div>  
                        </form>
                        
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col">
                            @forelse ($comment->CommentReplies as $reply)
                               
                                <hr>
                                <div class="row">.
                                    <p class="small mb-0 ms-2"> {{$reply->User->name}} at: {{ $reply->created_at }}</p>
                                </div> 
                                <div class="row ">
                                    <div class="col">
                                        <p>
                                            {{$reply->content}}   
                                        </p>
                                    </div>
                                    
                                    <div class="col d-flex flex-row align-items-center">
                                        @if(isset(Auth::user()->id)&&Auth::user()->id == $reply->user_id)
                                        <form action="/replies/{{ $reply->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                           
                                            <button type="submit" class="btn btn-body ">&larr;delete</button>
                                        </form>
                                        <button type="button" class="btn btn-body" onclick=" ReplyEdit({{ $reply->id}}) ">Edit</button>

                                        @endif
                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="popUp" style="display:none;" id="EditReply{{$reply->id}}">
                    
                                    <form action="/replies/{{$reply->id}}" method="POST" >
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <h5>
                                                Edit Reply
                                            </h5>
                                        </div>
                                        <div class="mb-3 row">
                                            <input type="hidden" class="form-control"  name="reply_id" value="{{$reply->id}}">
                                            <input type="text" class="form-control"  name="content" value="{{$reply->content}}">
                                        </div>
                                        <div >
                                            <button type="submit" class="btn btn-dark form-control" >Edit Reply</button>
                                        </div>  
                                    </form>
                                    
                                </div>
                                 
                                
                            @empty

                            
                          
                            @endforelse

                        </div>
                    </div>
                </div>
                
            </div>



        @empty
            <div class="card mb-4">
                <div class="card-body">
                    <p>
                        No comment for this post yet
                    </p>
                    <hr>
                </div>
            </div>
        @endforelse

        <div class="justify-content-center">
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
                            <input type="hidden" class="form-control"  name="post_id"  value="{{ $post->id }}">
                            
                            <textarea class="form-control"  name="content" rows="5"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-dark form-control">Comment</button>
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
    </div>

  
    

    <script>
    
    
    });
    //show form for editing comment in web pages
    function OpenEdit(id){

     
        $("#EditCommentForm"+id).toggle();
    }   

    //show form for creating reply in web pages
    function OpenNewReply(id){
        $("#AddReplyForm"+id).toggle();
    }

    //show form for editing reply in web pages
    function ReplyEdit(id){
        $("#EditReply"+id).toggle();
    }

    $(document).ready(function(){

         
   })
   </script>

@endsection
