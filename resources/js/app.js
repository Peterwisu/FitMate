const { default: axios } = require('axios');

require('./bootstrap');


// import { createApp } from 'vue';

// import App from "../components/App.vue"



// createApp(App).mount("#vueapp");

const message_el = document.getElementById("messages");
const username_input = document.getElementById("username");
const message_input = document.getElementById('message_input');
const user_id = document.getElementById("user_id");
const message_form = document.getElementById('message_form');
const url = document.querySelector('meta[name="base_url"]').content +'/send-message'
const csrf_token = document.querySelector('meta[name="csrf-token"]').content

$('#message_send').click(function (e){

     e.preventDefault();


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

        method: 'POST',
        url:'/send-message',
       
        data:{
            id: user_id.value,
            username: username_input.value,
            message: message_input.value,
           

        },
        TransformResponse: [(data)=>{

            return data;
        }]

    }

        
    axios(options);
    console.log('axios ')
  
});


window.Echo.channel('chat').listen('.message',(e)=>{
    
    console.log("receive", e);

    if(e.id ==user_id.value){
        $('#messages').append(`
    
        <div class="d-flex align-items-center text-right justify-content-end ">
        <div class="pr-2">
            <strong class="name">${e.username}</strong>
            <p class="current_user ">${e.message}</p>
        </div>
        
        
    </div>
        `)
    }else{

        $('#messages').append(`
        
        <div class="d-flex align-items-center">
        
        <div class="pr-2 pl-1">
        <span class="name">${e.username}</span>
        <p class="notcurrent_user">${e.message}</p>
        </div>
    </div>
        `);


    }

  
});