<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    use HasFactory;

    protected $table   =  'healths';

    protected $primarykey = 'id';

    protected $timestamp = true;

    protected $fillable = ['id','bmi','bfp','bmi_cat','bfp_cat'];


    public function Profile(){

        return $this->belongsTo(Profile::class);
    }


    public function User(){

        return $this->belongsTo(User::class);
    }


    public function getProfile($id){

        return  Profile::find($id);
    }
}
