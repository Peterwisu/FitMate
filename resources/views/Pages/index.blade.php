@extends('layouts.app')


@section('content')
    <section id="h-bg">
        <div class="container-fluid" >
            <div class="row justify-content-center">
                <div class="col-md-8 " style="height: 500">
                    <div class="row mb-5" style="height: 500px">
                        
                        <h1 class="mt-5">Welcome to our Web app</h1>
                        <div class="col">
                            <button type="button" class="btn btn-dark">

                                <a href="home" style="color: aliceblue">
                                    Get Start
                                </a>

                            </button>
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
                    <div class="col">
                        <button type="button" class="btn btn-secondary">Login</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-secondary">Register</button>
                    </div>

                </div>
                <div class="row mb-5">
                    <div class="col-md-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Vehicula ipsum a arcu cursus. Pellentesque dignissim enim sit amet venenatis
                        urna cursus. Lorem dolor sed viverra ipsum nunc. Cras tincidunt lobortis feugiat vivamus at.
                        Adipiscing elit duis tristique sollicitudin nibh sit amet.
                    </div>
                    <div class="col-md-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Accumsan in nisl nisi scelerisque eu. Tortor dignissim convallis aenean et
                        tortor. Lorem ipsum dolor sit amet consectetur adipiscing. Gravida cum sociis natoque penatibus.
                        Egestas purus viverra accumsan in nisl nisi scelerisque eu ultrices. Amet commodo nulla facilisi
                        nullam. Dictum at tempor commodo ullamcorper a lacus vestibulum. Interdum posuere lorem ipsum dolor
                        sit amet consectetur adipiscing.
                    </div>
                </div>

            </div>



        </div>





    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@0.5.21/dist/vanta.globe.min.js"></script>
    <script>
      VANTA.GLOBE({
        el: "#h-bg",
        mouseControls: true,
        mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00,
  scale: 1.00,
  scaleMobile: 1.00,
  color2: 0xaa8a8a,
  size: 2.00,
  backgroundColor: 0xffffff
      })
    </script>
@endsection
