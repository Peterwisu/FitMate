@extends('layouts.app')


@section('content')
    <section id="h-bg">
        <div class="container-fluid" >
            <div class="row justify-content-center">
                <div class="col-md-8 " style="height: 500">
                    <div class="row mb-5" style="height: 500px">
                        
                        <h1 class="mt-5, aaa">Best way to start your <span class ="Indigo">fitness journey<span></h1>
                        <p class="aab"> Insert some motivational shit here :) I am not sure why no centering </p>
                        <a href='/find'><button type="button" class="findgym">Find a Gym</button>
                        <a href='/calculator'><button type="button" class="calculator">Check out your fitness level</button>
                        
                        <p class="aac"> Trusted by gym rats across the country</p>
                       
                        <h2 class="mt-5, aad"> Insert motivational quote 2 skrr </h1>

                        <div class="boxed">
                            1000+   24/7     9     
                            <br> <span class="Subtext"> Gyms   Service     Fitness Measurements<span>
</div>

                        <div class="boxed2"> Boost your fitness experience. Start using FitMate today. 
                            <br> <span class="Subtext2"> more shit to quote <span>
                        

                      



                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container"><br>

            <div class="text-center">
                <div class="row mb-4">
                
               

                </div>
           
                    </div>
                
                    </div>
                </div>

            </div>



        </div>





    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
    <script>
      VANTA.NET({
  el: "#h-bg",
  mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00,
  scale: 1.00,
  scaleMobile: 1.00,
  color: 0x4f46E5,
  backgroundColor: 0xffffff,
  points: 14.00,
  maxDistance: 10.00
})
</script>
@endsection
