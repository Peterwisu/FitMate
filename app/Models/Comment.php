<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $primarykeys = 'id';

    public $timestamps = true;

    protected $fillable = ['content','replies_id','user_id','is_reply','post_id'];



    public function Post(){
        
        return $this->belongto(Post::class);
    }

   
    public function getreplies($commentID){

        // return $this->hasMany(Comment::class)->where('is_reply',true)
        return Comment::where('replies_id', $commentID)->get();
    }

    public function User(){

        return $this->belongsTo(User::class);
    }
}
