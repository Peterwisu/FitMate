<section>
    <div class="container mt-5" id="loop-comment">

        @forelse($post->PostComment as $comment)
            <!----Check if the comment is not replies (0 means is not reply ) --->
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
                                <!------ If user login and if user id is same as a user_id in comment show content ---->
                                @if (auth()->check() && Auth::user()->id == $comment->user_id)
                                    <!----form for delete comment --->
                                    <form action="/comment/{{ $comment->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-body">&larr;delete </button>
                                    </form>

                                    <!----Button toggle form for Edit comment --->
                                    <button type="button" class="btn btn-body "
                                        onclick=" OpenEdit({{ $comment->id }}) ">Edit</button>
                                @endif
                                <!--- if user is login show reply button ---->
                                @if (auth()->check())
                                    <!----Button toggle form for Add reply to comment --->
                                    <button type="button" onclick="OpenNewReply({{ $comment->id }})"
                                        class="btn btn-body ">Reply</button>
                                @endif
                            </div>

                        </div>
                        <!----form for Edit comment --->
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
                                    <button type="submit" class="btn btn-dark form-control"
                                        id="edit-comment-button-ajax" value="{{ $comment->id }}">Edit Comment</button>
                                </div>
                            </form>

                        </div>
                        <!----form for adding reply --->
                        <div class="popUp" style="display:none;" id="AddReplyForm{{ $comment->id }}">
                            <form action="/comment" method="POST">
                                @csrf
                                <div class="row">
                                    <h5>Reply</h5>
                                </div>
                                <div class="mb-3 row">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
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
                        <!----Button to toggle gide and show replies of a comment  ----->
                        <div class="row mt-2 mb-2 mx-2">
                            <div class="d-flex flex-row align-items-left ">
                                <button type="button" onclick="ShowReply({{ $comment->id }})" class="btn btn-body ">
                                    Show Reply</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!---- div that will get toggle show and hide replies of comment-->
            <div class="nested-reply" style="display:none;" id="ShowReply{{ $comment->id }}">
                <!---  Run loop to all reply that belong to this comment id --->
                @forelse(($comment->getreplies($comment->id)) as $reply)
                    <!----There is a reply and display-->
                    <div class="card mb-4 mx-5">
                        <div class="card body ">
                            <div class="row mt-3 mx-2">
                                <p class="small mb-0 ms-2"> {{ $reply->User->name }} at: {{ $reply->created_at }}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between mx-5 mt-4 mb-3">
                                <div class="d-flex flex-row align-items-center ">
                                    <h4>{{ $reply->content }}</h4>
                                </div>
                                <div class="d-flex flex-row align-items-center ml">
                                    <!------ If user login and if user id is same as a user_id in reply show content---->
                                    @if (auth()->check() && Auth::user()->id == $reply->user_id)
                                        <form action="/comment/{{ $reply->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-body">&larr;delete </button>
                                        </form>
                                        <button type="button" class="btn btn-body "
                                            onclick=" ReplyEdit({{ $reply->id }}) ">Edit</button>
                                    @endif
                                </div>

                            </div>
                            <!----form for Edit Reply --->
                        <div class="popUp" style="display:none;" id="EditReplyForm{{ $reply->id }}">

                            <form action="/comment/{{ $reply->id }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <h5>Edit</h5>
                                </div>
                                <div class="mb-3 row">
                                    <input type="hidden" class="form-control" name="id" value="{{ $reply->id }}">
                                    <div class="">
                                        
                                        <textarea class="form-control" name="content" rows="3"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-dark form-control"
                                        value="{{ $reply->id }}">Edit Comment</button>
                                </div>
                            </form>

                        </div>
                        </div>
                    </div>

                @empty

                    <!----There is no reply-->
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
            <!----There is no comment-->
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
