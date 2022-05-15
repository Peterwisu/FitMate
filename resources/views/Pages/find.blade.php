@extends('layouts.app')


@section('content')
    <div class="container mb-5 mt-3">
        <div class="row justify-content-center">
            <div class="">
                <p class="header_forum">FitMte Gym Finder</p>
            </div>

            <div class="mt-4" >
                <div class="card card_shadow" id=''>
                    <div class="card body ">

                        <div class="mx-4 mt-4">
                            <p class="forum_text" style="color:black">
                                Find Your Nearest Gym
                            </p>
                        </div>

                        <div class="mx-4 mt-1">
                            <p class="post_name" style="font-weight: 400">
                                Tell us your location we will show you what nearest optioms do you have
                            </p>
                        </div>

                        <div class="text-center mt-2 mb-4">

                            <button class='btn btn-dark' onclick="locatorButtonPressed()" style="width: 101px;
                            height: 38px;">
                                <p class="" style="color: white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>


                                    Search
                                </p>
                            </button>

                        </div>
                    </div>

                </div>

            </div>




        </div>
    </div>
    <div class='container'>
       
        <div id="container">
            <div id="map" class=""></div>
        </div>
        <div class="mt-5 text-center ">
            <p class="forum_all_post mx-5">
                Results
            </p>
            <p class="post_name">
                The result are arrange in order of nearest places
                
            </p>
        </div>
        <div  class='text-center'>
            <div id='places' class="row mx-5">
              

            </div>


         
            <button id="more">Load more results</button>
        </div>
    </div>


    <script>
        var lat = "51.24248284045735";
        var lng = "-0.5819955829087929";


        function initMap() {


            // Create the map.
            var pyrmont = new google.maps.LatLng(lat, lng);
            var map = new google.maps.Map(document.getElementById("map"), {
                center: pyrmont,
                zoom: 16,
                mapId: "8d193001f940fde3",
            });
            request = {
                location: pyrmont,
                rankBy: google.maps.places.RankBy.DISTANCE,
                type: "gym"
            }
            const image = "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
            const beachMarker = new google.maps.Marker({
                position: pyrmont,
                map,
                icon: image,
            });
            // Create the places service.
            const service = new google.maps.places.PlacesService(map);
            let getNextPage;
            const moreButton = document.getElementById("more");
            moreButton.onclick = function() {
                moreButton.disabled = true;
                if (getNextPage) {
                    getNextPage();
                }
            };

            // Perform a nearby search.
            service.nearbySearch(request,
                (results, status, pagination) => {
                    if (status !== "OK" || !results) return;

                    addPlaces(results, map);
                    moreButton.disabled = !pagination || !pagination.hasNextPage;
                    if (pagination && pagination.hasNextPage) {
                        getNextPage = () => {
                            // Note: nextPage will call the same handler function as the initial call
                            pagination.nextPage();
                        };
                    }
                }
            );


        }

        function addPlaces(places, map) {
            const placesList = document.getElementById("places");
            placesList.innerHTML = "";
            const infowindow = new google.maps.InfoWindow();
            count =1
            for (const place of places) {
                if (place.geometry && place.geometry.location) {
                    const image = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };
                    const marker = new google.maps.Marker({
                        map,
                        title: place.name,
                        position: place.geometry.location,
                    });
                    google.maps.event.addListener(marker, "click", () => {
                        const content = document.createElement("div");
                        const nameElement = document.createElement("h2");
                        nameElement.textContent = place.name;
                        content.appendChild(nameElement);
                        const placeIdElement = document.createElement("p");
                        placeIdElement.textContent = place.open;
                        content.appendChild(placeIdElement);
                        const placeAddressElement = document.createElement("p");
                        placeAddressElement.textContent = place.formatted_address;
                        content.appendChild(placeAddressElement);
                        infowindow.setContent(content);
                        infowindow.open(map, marker);
                    });
                    
                    const p = document.createElement("p");
                  
                    const hr = document.createElement("hr");
                    const col = document.createElement("div");
                    const card = document.createElement("div");
                    const card_body = document.createElement('div');
                    const link = document.createElement('a');
                    const icon = document.createElement('svg');
                    p.textContent = count + '. '+place.name;
                    link.textContent = 'Search on google'
                    count=count+1


                    
                    placesList.appendChild(col);
                    col.setAttribute('class','col-md-6 mb-4 mt-4')
                   
                    col.appendChild(card)
                    card.setAttribute('class', 'card')
                    card.setAttribute('class','card_shadow')
                    
                    card.appendChild(card_body);
                    card_body.setAttribute('class','card body')
                    card_body.appendChild(p)
                    p.setAttribute('class','post_author mt-4')
                    card_body.appendChild(hr)
                    hr.setAttribute('style','background-color: #8f8d8d')
                    card_body.appendChild(link)
                    link.setAttribute('class','post_author mt-3 mb-3')
                    link.setAttribute('href',`https://www.google.com/search?q=${place.name}&sxsrf=ALiCzsatnUpW-_OiJamWa05Lse0V5OUHZg%3A1652574541031&ei=TUmAYsfRAYKFhbIPi5eGuAk&ved=0ahUKEwiHrO7zn-D3AhWCQkEAHYuLAZcQ4dUDCA4&uact=5&oq=a&gs_lcp=Cgdnd3Mtd2l6EAMyBAgjECcyBAgjECcyBAgjECcyBQgAEJECMgUIABCRAjIRCC4QgAQQsQMQgwEQxwEQ0QMyCwgAEIAEELEDEIMBMhEILhCABBCxAxCDARDHARCjAjIRCC4QgAQQsQMQgwEQxwEQowIyEQguEIAEELEDEIMBEMcBENEDSgQIQRgASgQIRhgAUABYAGDYBGgAcAF4AIABZogBZpIBAzAuMZgBAKABAcABAQ&sclient=gws-wiz`)


                    p.addEventListener("click", () => {
                        map.setCenter(place.geometry.location);
                        const content = document.createElement("div");
                        const nameElement = document.createElement("h2");
                        nameElement.textContent = place.name;
                        content.appendChild(nameElement);
                       
                        // const placeIdElement = document.createElement("p");
                        // placeIdElement.textContent = place.place_id;
                        // content.appendChild(placeIdElement);
                        // const placeAddressElement = document.createElement("p");
                        // placeAddressElement.textContent = place.formatted_address;
                        // content.appendChild(placeAddressElement);
                        infowindow.setContent(content);
                        infowindow.open(map, marker);

                        $(this).scrollTop(2);

                       
                    });

                }

            }
        }

        function locatorButtonPressed() {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    this.lat = position.coords.latitude;
                    this.lng = position.coords.longitude;
                    initMap()
                    console.log(this.lat + ',' + this.lng)
                },
                (error) => {
                    console.log("Error getting location");
                }

            );

        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.key') }}&callback=initMap&libraries=places&v=weekly"
        async></script>
@endsection
