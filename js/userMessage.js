

 function updateUserMessage(message){

    var chat = document.getElementById('chat');
    var div= document.createElement('div');
    div.setAttribute("class","message sender2");
    div.textContent=message;
    chat.appendChild(div);


 }

 document.getElementById('sendMessage').addEventListener('click',function(){
    var mainput = document.getElementById('MessageInput');
    var msg = mainput.value;
    updateUserMessage(msg)
    mainput.value="";

 })