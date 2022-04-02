<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;


    protected $table = 'profiles';

    protected $primarykeys ='id';

    public $timestamps = true;

    protected $fillable = ['id','title','gender','date_of_birth','height','weight','neck','waist'];


    public function User(){

        return $this->belongsTo(User::class);
    }
}
