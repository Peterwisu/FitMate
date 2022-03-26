<template>
  <div class="container mb-5">
    <div class="row justify-content-center">
      <div class="col-md-12 text-center">
        <h1 class="">Find</h1>
      </div>
      <div class="row mt-5">
        <form>
          <div class="form-group">
            <label>Email address</label>
            <input
              type="text"
              class="form-control"
              placeholder="Address"
              v-model="coordinates"
            />
            <a @click="locatorButtonPressed"> get location</a>
          </div>
          <select class="form-control" v-model="type">
            <option value="gym">gym</option>
          </select>
          <select
            class="form-control"
            v-model="radius"
            aria-placeholder="Distance"
          >
            <option value="10">10 KM</option>
            <option value="50">50 KM</option>
            <option value="100">100 KM</option>
            <option value="200">200 KM</option>
          </select>
          <button class="ui button" @click="findCloseBuyButtonPressed()">
            Find Gym
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>


export default {
  name: "App",
  data() {
    return {
      lat: 0,
      lng: 0,
      type: "",
      radius: "",
      places: [],
    };
  },
  computed: {
    coordinates() {
      return `${this.lat}, ${this.lng}`;
    },
  },
  methods: {
    locatorButtonPressed() {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          this.lat = position.coords.latitude;
          this.lng = position.coords.longitude;
        },
        (error) => {
          console.log("Error getting location");
        }
      );
    },
    findCloseBuyButtonPressed() {
      var axios = require('axios');
       const URL = `https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=${
              this.lat
            },${this.lng}&type=${this.type}&radius=${
              this.radius * 1000
            }&key=AIzaSyB6HCLEuHVuS4r46z1LXsQdW4VYL_1sagU`;
        alert(URL)
        console.log(URL)
            axios
              .get(URL)
              .then((response) => {
                alert('res ')
                console.log(response.data);
              })
            .catch((error) => {
                  alert('error ')
                console.log(error.message);
              });
              alert(URL)
    },

    //   var axios = require('axios');

    //   var config = {
    //     method: 'get',
    //     url:  `https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=${
    //             this.lat
    //           },${this.lng}&type=${this.type}&radius=${
    //             this.radius * 1000
    //           }&key=AIzaSyB6HCLEuHVuS4r46z1LXsQdW4VYL_1sagU`,
    //     headers: { }
    //   };
    //   alert(config.url)
    //   console.log(config.url)
    //   axios(config)
    //   .then(function (response) {
    //     console.log(JSON.stringify(response.data ));
    //   })
    //   .catch(function (error) {
    //     console.log(error);
    //   });
    //   alert("hello")
    // },
  }
};
</script>

<style>
</style>