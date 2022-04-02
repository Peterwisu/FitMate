<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::all();

        return view('profile.index',['profiles'=>$profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




        // dd(auth()->user()->id);


        $data = request()->validate([
            // Validation for date of birth
            'DateOfBirth'    => 'nullable|date_format:Y-m-d|before:today',
        
        ]);
        $profile = Profile::create([
            'title'=>$request->input('title'),
            'gender'=>$request->input('gender'),
            'date_of_birth'=>$request->input('DateOfBirth'),
            'height'=>$request->input('height'),
            'weight'=>$request->input('weight'),
            'neck'=>$request->input('neck'),
            'waist'=>$request->input('waist'),
            'id'=>auth()->user()->id
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $profile = Profile::find($id);
        
        if($profile == null){
            return redirect('profile/create');
        }else{

            return view('profile.show')->with('profile',$profile);
        }


        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);

       
        return view('profile.edit')->with('profile',$profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            // Validation for date of birth
            'DateOfBirth'    => 'nullable|date_format:Y-m-d|before:today',
        
        ]);
        $profile = Profile::where('id',$id)->update([
            'title'=>$request->input('title'),
            'gender'=>$request->input('gender'),
            'date_of_birth'=>$request->input('DateOfBirth'),
            'height'=>$request->input('height'),
            'weight'=>$request->input('weight'),
            'neck'=>$request->input('neck'),
            'waist'=>$request->input('waist'),
            'id'=>auth()->user()->id
        ]);
        

        return redirect('/profile/'.$id);
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
