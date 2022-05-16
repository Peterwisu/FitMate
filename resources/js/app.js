const { default: axios } = require('axios');

require('./bootstrap');


// import { createApp } from 'vue';

// import App from "../components/App.vue"



// createApp(App).mount("#vueapp");

const message_el = document.getElementById("messages");
const username_input = document.getElementById("username");
const message_input = document.getElementById('message_input');
const message_form = document.getElementById('message_form');


message_form.addEventListener('submit',function (e){

     e.preventDefault();
    e.stopPropagation();

    let has_errors =false;

    if( username_input.value == ''){

        alert("Please enter a username");
        has_errors = true;
    }

    if(message_input.value == ''){

        alert("Please enter a message");
        has_errors = true;
    }

    if(has_errors){

        return;
    }


    const options = {

        method: 'post',
        url:'/send-message',
        data:{
            username: username_input.value,
            message: message_input.value
        },
        TransformResponse: [(data)=>{

            return data;
        }]

    }


    axios(options);
  
});


window.Echo.channel('chat').listen('.message',(e)=>{

    console.log(e);

    $('#messages').append(`<div class="message"><strong>${e.username}</strong>: ${e.message}</div>`)
});