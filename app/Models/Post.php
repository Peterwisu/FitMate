<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $primarykeys ='id';

    public $timestamps = true;

    protected $fillable = ['name','content','user_id'];

    
    
    //This Post can has many comment  (one to many)
    public function PostComment(){

        
        return $this->hasMany(Comment::class);
    }
  
    //This Post can only belong to one User(many to one)
    public function User(){

        return $this->belongsTo(User::class);
    }



    // public function getcomment(){

    //    $comments = Comment::where('post_id',$this->id)->where('is_reply',false)->get();

    //     return  $this->hasMany($comments);

    // }

}
