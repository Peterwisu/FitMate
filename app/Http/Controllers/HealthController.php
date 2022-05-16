<?php

namespace App\Http\Controllers;

use App\Models\Health;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HealthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
            if (! Gate::allows('update-health', $health)) {
                abort(403);
            }
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
