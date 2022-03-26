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
