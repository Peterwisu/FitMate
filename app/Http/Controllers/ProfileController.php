<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Profile;
use App\Models\Health;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class ProfileController extends Controller
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

        // Validation for input data
        $data = request()->validate([
            
            'DateOfBirth'    => 'required|date_format:Y-m-d|before:today',
            'title'          => 'required',
            'gender'         => 'required',
            'height'         => 'required|max:300',
            'weight'         => 'required|max:300',
            'neck'           => 'required|max:300',
            'waist'          => 'required|max:300',
            'act_level'      => 'required',

        ]);

        /**    Calculate Health Fitness  */
        $age = (date_diff(date_create($request->input('DateOfBirth')), date_create(date("Y-m-d"))))->format('%y')     ;

        $bmi = $this->calculate_bmi($request->input('height'), $request->input('weight'));

        $gender = $request->input('gender');

        $bmi_cat =$this->category_bmi($bmi);
       
        $bfp = $this->calculate_body_fat($bmi , $age, $gender);

        $bfp_cat = $this->category_body_fat($bfp, $gender);
       

        // Create New profile
        $profile = Profile::create([
            'title'=>$request->input('title'),
            'gender'=>$request->input('gender'),
            'date_of_birth'=>$request->input('DateOfBirth'),
            'height'=>$request->input('height'),
            'act_level'=>$request->input('act_level'),
            'weight'=>$request->input('weight'),
            'neck'=>$request->input('neck'),
            'waist'=>$request->input('waist'),
            'id'=>auth()->user()->id
        ]);

         // Create New Health
        $health = Health::create([
            
            'id'=>auth()->user()->id,
            'bfp'=>$bfp,
            'bmi'=>$bmi,
            'bmi_cat'=>$bmi_cat,
            'bfp_cat'=>$bfp_cat,
            

        ]);


        return redirect('/profile/'.auth()->user()->id);
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
        if (! Gate::allows('update-profile', $profile)) {
            abort(403);
        }

        // if profile does not exist in database then redirect it to create page
        if($profile == null){
            return redirect('profile/create');
        }else{
            //if profile does exist in database then show profile page
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
        if (! Gate::allows('update-profile', $profile)) {
            abort(403);
        }

       
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

        $profile = Profile::find($id);
        if (! Gate::allows('update-profile', $profile)) {
            abort(403);
        }
        // Validation for input data
        $data = request()->validate([
            
            'DateOfBirth'    => 'required|date_format:Y-m-d|before:today',
            'title'          => 'required',
            'gender'         => 'required',
            'height'         => 'required|digits_between:1,3',
            'weight'         => 'required|digits_between:1,3',
            'neck'           => 'required|digits_between:1,3',
            'waist'          => 'required|digits_between:1,3',
            'act_level'      => 'required',

        ]);
        // Update profile
        $profile = Profile::where('id',$id)->update([
            'title'=>$request->input('title'),
            'gender'=>$request->input('gender'),
            'date_of_birth'=>$request->input('DateOfBirth'),
            'height'=>$request->input('height'),
            'act_level'=>$request->input('act_level'),
            'weight'=>$request->input('weight'),
            'neck'=>$request->input('neck'),
            'waist'=>$request->input('waist'),
            'id'=>auth()->user()->id
        ]);


        ///------------------------------  caluate new Health Fitness and Update health-----------------------------------//

        $age = (date_diff(date_create($request->input('DateOfBirth')), date_create(date("Y-m-d"))))->format('%y')     ;

        $bmi = $this->calculate_bmi($request->input('height'), $request->input('weight'));

        $gender = $request->input('gender');

        $bmi_cat =$this->category_bmi($bmi);
       
        $bfp = $this->calculate_body_fat($bmi , $age, $gender);

        $bfp_cat = $this->category_body_fat($bfp, $gender);

        $health = Health::where('id',$id)->update([
              
            'bfp'=>$bfp,
            'bmi'=>$bmi,
            'bmi_cat'=>$bmi_cat,
            'bfp_cat'=>$bfp_cat,
            
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



    // <-----------------  Calulate Health Fitness-------------->

   public function calculate_bmi($height ,$weight){


        // convert height from cm to m
        $height_to_m = $height/100;

        $bmi = $weight/pow($height_to_m,2);

        return ceil($bmi);
    
    }

    public function category_bmi($bmi){

        if($bmi<16){

            $category = 'Severe Thinness';

        }elseif($bmi>=16&&$bmi<17){

            $category = 'Moderate Thinness';

        }elseif ($bmi>=17&&$bmi<18.5) {

            $category = 'Mild Thinness';

        }elseif ($bmi>=18.5&&$bmi<25) {
            
            $category = 'Normal';

        }elseif ($bmi>=25&&$bmi<30) {
                
            $category = 'Overweight';

        }elseif ($bmi>=30&&$bmi<35) {
                
            $category = 'Obese Class I';

        }elseif ($bmi>=35&&$bmi<=40) {
               
            $category = 'Obese Class II';

        }elseif ($bmi>40) {
               
            $category = 'Obese Class III';

        }

        return  $category;
    
    }


    public function calculate_body_fat($bmi , $age , $gender){

        if($gender == 'male'){

            if($age>=18){
              
               $BFP = 1.20 * $bmi + 0.23  * $age - 16.2;
               
            }else{
                
                $BFP = 1.51 * $bmi - 0.7  * $age - 2.2;
               
            }
        }else{

            if($age>=18){
               
                $BFP = 1.20 * $bmi + 0.23  * $age - 5.4;
            
            }else{
                 
                $BFP = 1.51 * $bmi - 0.7  * $age + 1.4 ;
  
            }

        }

        return ceil($BFP);
    
    }

    public function category_body_fat($bfp, $gender){

        //$bfp_cat= null;
        if($gender =='male'){

            if($bfp>=2&&$bfp<=5){
                $bfp_cat ='Essential fat';
            }elseif ($bfp>=6&&$bfp<=13) {
                $bfp_cat ='Athletes';
            }
            elseif ($bfp>=14&&$bfp<=17) {
                $bfp_cat ='Fitness';
            }
            elseif ($bfp>=18&&$bfp<=24) {
                $bfp_cat ='Average';
            }
            elseif ($bfp>=25) {
                $bfp_cat ='Obese';
            }

        }else{

            if($bfp>=10&&$bfp<=13){
                $bfp_cat ='Essential fat';
            }elseif ($bfp>=14&&$bfp<=20) {
                $bfp_cat ='Athletes';
            }
            elseif ($bfp>=21&&$bfp<=24) {
                $bfp_cat ='Fitness';
            }
            elseif ($bfp>=25&&$bfp<=31) {
                $bfp_cat ='Average';
            }
            elseif ($bfp>=32) {
                $bfp_cat ='Obese';
            }

        }

        return $bfp_cat;
    }


    
    }
