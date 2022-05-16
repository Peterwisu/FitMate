var DOB= null;
var height =null;
var gender=null;
var neck=null;
var activity_level=null;
var waist=null;
var weight=null;

$('document').ready(
    
    
    $('#calculate').click((e)=>{

        e.preventDefault();
        DOB= age($('#DOB').val());
        height = $('#height').val();
        gender= $('#gender').val();
        neck= $('#neck').val();
        activity_level= $('#act_level').val();
        waist= $('#waist').val();
        weight= $('#weight').val();
        
        if($('#vali').valid()){

        $( "#BMI" ).empty()
        $( "#BMR" ).empty()
        $( "#BodyFat" ).empty()
        $( "#BodyFatMass" ).empty()
        $( "#LeanBodyFat" ).empty()
        $( "#health_status" ).empty()
        //$( "#IdealBodyFat" ).empty()
        // $( "#Calo_WL" ).empty()
        // $( "#Calo_MT" ).empty()
        // $( "#Calo_WG" ).empty()
        


        $( "#BMI" ).append( $( `<p> ${BMI(weight,height)}</p>` ) );
        $( "#BMR" ).append( $( `<p> ${BMR(gender,weight,DOB,height)} kcal/day</p>` ) );
        $( "#BodyFat" ).append( $( `<p> ${bodyfat(gender,BMI(weight,height),DOB)} %</p>` ) );
        $( "#BodyFatMass" ).append( $( `<p> ${bodyfatmass(bodyfat(gender,BMI(weight,height),DOB),weight)}  kilograms</p>` ) );
        $( "#LeanBodyFat" ).append( $( `<p> ${LBM(weight,bodyfatmass(bodyfat(gender,BMI(weight,height),DOB),weight))}  kilograms</p>` ) );
        healthStatus(BMI(weight,height));

        //$( "#IdealBodyFat" ).append( $( `<p> ${BMI(weight,height)}</p>` ) );
        // $( "#Calo_WL" ).append( $( `<p> ${BMI(weight,height)}</p>` ) );
        // $( "#Calo_MT" ).append( $( `<p> ${BMI(weight,height)}</p>` ) );
        // $( "#Calo_WG" ).append( $( `<p> ${BMI(weight,height)}</p>` ) );

        }

    })


);

function healthStatus(bmi){

    
    if(bmi>=18.5 && bmi<=25){
        $("#health_status").append($(`<div class="alert alert-success mt-2" role="alert">
        
        <h5>You are doing great!</h5>      
        
        </div>  `));
    }else if(bmi>25 && bmi<=30 ){
        $("#health_status").append($(`<div class="alert alert-warning mt-2" role="alert">

        <h5>You are overweight!</h5>    
        
        
        </div>  `));
    }else if(bmi>30 && bmi<=35 ){
        $("#health_status").append($(`<div class="alert alert-danger mt-2" role="alert">

        <h5>You are overweight!</h5>    
        <p> Obese Class I</p>
        
        
        </div>  `));
    }else if(bmi>35 && bmi<=40 ){
        $("#health_status").append($(`<div class="alert alert-danger mt-2" role="alert">

        <h5>You are overweight!</h5>    
        <p> Obese Class II</p>
        
        
        </div>  `));
    }else if(bmi>40 ){
        $("#health_status").append($(`<div class="alert alert-danger mt-2" role="alert">

        <h5>You are overweight!</h5>    
        <p> Obese Class III</p>
        
        
        </div>  `));
    }else
    if(bmi>17 &&bmi<18.5 ){
        $("#health_status").append($(`<div class="alert alert-warning mt-2" role="alert">

        <h5>You are underweight!</h5>    
        <p> Mild Thinness</p>
        
        
        </div>  `));
    }else
    if(bmi>=16 && bmi<=17 ){
        $("#health_status").append($(`<div class="alert alert-danger mt-2" role="alert">

        <h5>You are underweight!</h5>    
        <p> Moderate Thinness</p>
        
        
        </div>  `));
    }else
    if(bmi<16 ){
        $("#health_status").append($(`<div class="alert alert-danger mt-2" role="alert">

        <h5>You are underweight!</h5>    
        <p> Severe Thinness</p>
        
        
        </div>  `));
    }


}

function age(dob){

    var now =new Date();                            //getting current date
    var currentY= now.getFullYear();                //extracting year from the date
 
    var Dob= new Date(dob);                             //formatting input as date
    var prevY= Dob.getFullYear();                          
    var age =currentY - prevY;

    return  age;

}

function bodyfat(gender,bmi,age){
    let BFP;
    if(gender == 'male'){

        if(age>=18){
          
           BFP = 1.20 * bmi + 0.23  * age - 16.2;
           
        }else{
            
            BFP = 1.51 * bmi - 0.7  * age - 2.2;
           
        }
    }else{

        if(age>=18){
           
            BFP = 1.20 * bmi + 0.23  * age - 5.4;
        
        }else{
             
            BFP = 1.51 * bmi - 0.7  * age + 1.4 ;

        }

    }

    return BFP.toFixed(1);

}

function bodyfatmass(bodyfat,weight){
    return ((bodyfat/100) * weight).toFixed(1);
}

function LBM(weight,bodyfatmass){
    return  (weight - bodyfatmass).toFixed(1);
}

function BMI(weight,height){

    let height_m = height/100
    let bmi = weight/(height_m*height_m)

    return bmi.toFixed(1)

}

function BMR(gender,weight,age,height){

    let bmr ;

    if(gender == 'male'){

        bmr = 10*weight + 6.25*height - 5*age + 5;

    }else{

        bmr = 10*weight + 6.25*height - 5*age - 161;

    }

    return bmr
}


// function Calo_WL(){


// }


// function Calo_MT(){


// }

// function Calo_WG(){


// }

// function idea_weight(gender,height){

  
// }