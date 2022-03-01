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


    public function PostComment(){


        return $this->hasMany(Comment::class);
    }

    public function User(){

        return $this->belongsTo(User::class);
    }

}
