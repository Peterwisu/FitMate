<!------Add comment to Posts---->

<section>
    @if (auth()->check())
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
                            <input type="hidden" name="post_id" id="add-comment-user-id-ajax"
                                value="{{ $post->id }}">
                            <input type="hidden" name="is_reply" value='0'>
                            <textarea class="form-control" name="content" rows="5" id="add-comment-ajax"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-dark form-control"
                                id="add-comment-button-ajax">Comment</button>
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
                <div class="col"></div>
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
