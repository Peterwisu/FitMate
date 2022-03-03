<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;


    protected $table = 'comments';

    protected $primarykeys ='id';

    public $timestamps = true;

    protected $fillable = ['content','post_id','user_id'];

    //This comment can only belong to one Post (many to one)
    public function Post(){

        return $this->belongsTo(Post::class);
    }
    //This comment can has many reply to  (one to many)
    public function CommentReplies(){


        return $this->hasMany(Replies::class);
    }

    //This comment can only belong to one User(many to one)
    public function User(){

        return $this->belongsTo(User::class);
    }
}
