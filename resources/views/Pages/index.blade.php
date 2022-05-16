@extends('layouts.app')


@section('content')
    <section id="h-bg">
        <div class="container-fluid" >
            <div class="row d-flex justify-content-center">
                <div class="w-75 pt-5" style="padding-bottom: 150px">
                    <h1 class="aaa">Best way to start your <span class ="Indigo">fitness journey</span></h1>
                    <p class="aab"> Welcome to our FitMate website! Do you want to start your fitness journey but are not sure where to begin? No need to look any further! </p>
                    <div class="main-buttons">
                        <a href='/find'><button type="button" class="btn-sub border-0">Find a Gym</button></a>
                        <a href='/calculator'><button type="button" class="calc">Check out your fitness level</button></a>
                    </div>
                </div>

                <div class="w-75" style="padding-bottom: 150px">
                    <p class="aac"> Trusted by gym rats across the country</p>
                    <p class="mt-5 aab p-1 pb-3">Let the numbers speak for themselves.</p>
                    <div class="d-flex justify-content-around boxed">
                        <div>
                            <p>1000+</p><p class="Subtext"> Gyms</p>
                        </div>
                        <div>
                            <p>24/7</p><p class="Subtext">Service</p>
                        </div>
                        <div>
                            <p>9</p><p class="Subtext">Fitness Measurements</p>
                        </div>
                    </div>
                </div>


                <div class="boxed2">
                    <p class="aac text-white">Boost your fitness experience.</p>
                    <p class="aac text-white">Start using FitMate today.</p>
                    <p class="aab w-50 bg-transparent text-white">We really hope you will enjoy our website and stay for longer! If you want to keep track of your progress, we recommend you create an account to save your data.</p>
                    <a href='/register'><button type="button" class="calc">Sign up for free</button></a>
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
