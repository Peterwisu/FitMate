




<div class="main hidden" id="chat-div">
    <div class="px-2 scroll">
        <div class="" id="messages"></div>
    </div>
    <nav class="navbar bg-white navbar-expand-sm  justify-content-between">
        <div class="mx-2">

            <form id=message_form>
                
               
                  
                     
                        <input type="hidden" name="user_id" id='user_id' value="{{ auth()->user()->id }}">
                        <input type="hidden" name="username" id='username' value="{{ auth()->user()->name }}">
                        {{-- <input type="text" name="message" id="message_input" placeholder="Write a message ...."> --}}

                  

                                <textarea name="message" id="message_input" class="form-control"  style="width:100"cols="50" placeholder="Write a message ...."rows="2"></textarea>
                           
                            

                                <button type="submit" class="btn btn-sub " id="message_send">Send Message</button>
                                <button type='button'
                                onclick="ToggleChat()" class="btn btn-warning " >Hide Chat</button>
                            
                        
                                        
             
            </form>
        </div>
    </nav>
</div>
<div class="" id="show_button">
    <button type='button'
                                onclick="ToggleChat()" class="btn btn-warning  "  >Show Chat</button>
                            
</div>
<script>

function ToggleChat(){
    
    if($('#chat-div').hasClass('hidden')){

        $('#chat-div').removeClass('hidden');
        $('#show_button').addClass('hidden');
        console.log('sjow button');



    }else{
        $('#chat-div').addClass('hidden');
        $('#show_button').removeClass('hidden');
    }

}





</script>