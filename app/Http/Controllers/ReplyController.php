<?php

namespace App\Http\Controllers;
use App\Models\Replies;
use App\Models\Comment;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $replies =Replies::create([

         
            'content'=>$request->input('content'),
            'comment_id'=>$request->input('comment_id'),
            'user_id'=>auth()->user()->id
        ]);

        $comment = $request->comment_id;
        
        $post_id = Comment::find( $comment)->post_id;
        
        return redirect('/posts/'.$post_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $reply = Replies::where('id',$id)->update([

        
            "content"=>$request->input('content')
        ]);

        
        $comment_id = Replies::find($id)->comment_id;
       
        $post_id = Comment::find($comment_id)->post_id;
        
        return redirect('/posts/'.$post_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = Replies::find($id);

        $reply->delete();

        
        $comment = $reply->comment_id;
        $post_id = Comment::find( $comment)->post_id;
        
        return redirect('/posts/'.$post_id);
        
    }
}
