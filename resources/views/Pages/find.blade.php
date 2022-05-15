@extends('layouts.app')
@section('content')
    <div class="container mb-5 find-map">
        <div class="row">
            <div class="col-md-8 mt-4">
                <h2 class="fit-title">FitMate Gym Finder</h2>
            </div>

            <div class="sub-title me-3 mt-4" >
              <h4>Find Your Nearest Gym</h4>
              <p>
                Tell us your location and we will show you what nearest options do you have.
              </p>
            </div>
        </div>
        <div class="row d-flex justify-content-center mx-auto mt-2 mb-4" style="width:760px;">
          <div class="col-md-8">
           <input type="text" class="form-control" placeholder="Location"/>
         </div>
         <div class="col-md-4">
           <button type="button" class="search-btn"><i class="fa fa-search"></i>Search</button>
         </div>
        </div>
    </div>
    <div class='container find-map'>
        <div id="map" ></div>


        <div class="subtitle mt-4 mx-2"><h4>Result</h4></div>
        <div class="row">
          <div class="col-md-6">
            <div class="card mx-auto" style="width: 344px;">
              <div class="card-body">
                <div class="d-flex justify-content-center">
                  <h5 class="card-title">The Gym Guildford</h5><span class="gym-badge rounded-pill gym-info mx-2">Gym</span>
                </div>
                <p class="card-text">3 Woodbridge Meadows, Guildford GU1 1BA</p>
                <div class="row d-flex justify-contact-center border-top pt-3">
                    <div class="col-md-6 text-center">
                      <div class="contact-text"><i class="fa fa-envelope-o pe-2"></i>Email</div>
                    </div>
                    <div class="col-md-6 text-center">
                      <div class="contact-text"><i class="fa fa-phone pe-2"></i>Call</div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mx-auto" style="width: 344px;">
              <div class="card-body">
                <div class="d-flex justify-content-center">
                  <h5 class="card-title">The Gym Guildford</h5><span class="gym-badge rounded-pill gym-info mx-2">Gym</span>
                </div>
                <p class="card-text">3 Woodbridge Meadows, Guildford GU1 1BA</p>
                <div class="row d-flex justify-contact-center border-top pt-3">
                    <div class="col-md-6 text-center">
                      <div class="contact-text"><i class="fa fa-envelope-o pe-2"></i>Email</div>
                    </div>
                    <div class="col-md-6 text-center">
                      <div class="contact-text"><i class="fa fa-phone pe-2"></i>Call</div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-md-6">
            <div class="card mx-auto" style="width: 344px;">
              <div class="card-body">
                <div class="d-flex justify-content-center">
                  <h5 class="card-title">Garage Gym Fitness</h5><span class="gym-badge rounded-pill gym-info mx-2" style="width:114px; background-color:#D1E1FA;">Personal Trainer</span>
                </div>
                <p class="card-text">74 Cline Rd, Guildford GU1 3NH</p>
                <div class="row d-flex justify-contact-center border-top pt-3">
                    <div class="col-md-6 text-center">
                      <div class="contact-text"><i class="fa fa-envelope-o pe-2"></i>Email</div>
                    </div>
                    <div class="col-md-6 text-center">
                      <div class="contact-text"><i class="fa fa-phone pe-2"></i>Call</div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mx-auto" style="width: 344px;">
              <div class="card-body">
                <div class="d-flex justify-content-center">
                  <h5 class="card-title">Garage Gym Fitness</h5><span class="gym-badge rounded-pill gym-info mx-2" style="width:114px; background-color:#D1E1FA;">Personal Trainer</span>
                </div>
                <p class="card-text">74 Cline Rd, Guildford GU1 3NH</p>
                <div class="row d-flex justify-contact-center border-top pt-3">
                    <div class="col-md-6 text-center">
                      <div class="contact-text"><i class="fa fa-envelope-o pe-2"></i>Email</div>
                    </div>
                    <div class="col-md-6 text-center">
                      <div class="contact-text"><i class="fa fa-phone pe-2"></i>Call</div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-md-6">
            <div class="card mx-auto" style="width: 344px;">
              <div class="card-body">
                <div class="d-flex justify-content-center">
                  <h5 class="card-title">Surrey Sports Park</h5><span class="gym-badge rounded-pill gym-info mx-2" style="width:110px; background-color:#FAF8D1;">Sports complex</span>
                </div>
                <p class="card-text">Richard Meyjes Rd, Guildford GU2 7AD</p>
                <div class="row d-flex justify-contact-center border-top pt-3">
                    <div class="col-md-6 text-center">
                      <div class="contact-text"><i class="fa fa-envelope-o pe-2"></i>Email</div>
                    </div>
                    <div class="col-md-6 text-center">
                      <div class="contact-text"><i class="fa fa-phone pe-2"></i>Call</div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mx-auto" style="width: 344px;">
              <div class="card-body">
                <div class="d-flex justify-content-center">
                  <h5 class="card-title">Surrey Sports Park</h5><span class="gym-badge rounded-pill gym-info mx-2" style="width:110px; background-color:#FAF8D1;">Sports complex</span>
                </div>
                <p class="card-text">Richard Meyjes Rd, Guildford GU2 7AD</p>
                <div class="row d-flex justify-contact-center border-top pt-3">
                    <div class="col-md-6 text-center">
                      <div class="contact-text"><i class="fa fa-envelope-o pe-2"></i>Email</div>
                    </div>
                    <div class="col-md-6 text-center">
                      <div class="contact-text"><i class="fa fa-phone pe-2"></i>Call</div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
<script>
  var lat = 51.24248284045735;
  var lng = -0.5819955829087929;

    let map;

    function initMap() {
      map = new google.maps.Map(document.getElementById("map"), {
        center: { lat, lng},
        zoom: 16,
      });
    }

    window.initMap = initMap;
</script>
<script
      src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.key') }}&callback=initMap&v=weekly"
      defer
    ></script>
@endsection
