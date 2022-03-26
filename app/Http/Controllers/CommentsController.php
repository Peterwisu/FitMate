<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
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

        $replies_id = null;
        if($request->is_reply==1){
            $replies_id = $request->replies_id;
        }
            
      
        
         $comment =Comment::create([
        'content'=>$request->input('content'),
        'post_id'=>$request->input('post_id'),
        'is_reply'=>$request->input('is_reply'),
        'replies_id' => $replies_id,
        'user_id'=>auth()->user()->id
         ]);
         //get a post_id of a post to redirect page back to that post
         $post =$request->post_id;
         $response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );

        if($request->is_reply==1){
            return redirect('/posts/'.$post);
        }
        else{
         return response()->json([
             'username'=>$comment->User->name,
             'create_at'=>$comment->created_at,
             'content'=> $comment->content,
             'user_id'=>$comment->user_id,
             'id'=>$comment->id,    
         ]);
        }
            


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

        

        $comment = Comment::where('id',$id)->update([

        
            "content"=>$request->input('content')
        ]);



        
        
        //get a post_id of a post to redirect page back to that post
        $post_id = Comment::find($id)->post_id;
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
        $comment = Comment::find($id); //<- can be done by this way as well by cahnging parameter to $id

        $comment->delete();

        
        //get a post_id of a post to redirect page back to that post
        $post_id=$comment->post_id;

        return redirect('/posts/'.$post_id);
    }
}
