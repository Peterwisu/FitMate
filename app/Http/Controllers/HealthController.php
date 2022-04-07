<?php

namespace App\Http\Controllers;

use App\Models\Health;
use Illuminate\Http\Request;


class HealthController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $health= Health::find($id);
        
        
        // if profile does not exist in database then redirect it to create page
        if($health == null){
            return redirect('profile/create');
        }else{
            //if health does exist in database then show profile page
            return view('health.show')->with('health',$health);
        }


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
