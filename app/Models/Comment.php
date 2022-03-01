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

    public function Post(){

        return $this->belongsTo(Post::class);
    }

    public function CommentReplies(){


        return $this->hasMany(Replies::class);
    }


    public function User(){

        return $this->belongsTo(User::class);
    }
}
