<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    use HasFactory;


    protected $table = 'replies';

    protected $primarykeys ='id';

    public $timestamps = true;

    protected $fillable = ['content','comment_id','user_id'];
     //This reply can only belong to one Comment(many to one)
    public function Comment(){

        return $this->belongsTo(Comment::class);
    }
    
    //This reply can only belong to one User(many to one)
    public function User(){

        return $this->belongsTo(User::class);
    }

}
