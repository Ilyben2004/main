var chatid = document.getElementById('chat');
var useridid= chatid.getAttribute("userID");


 function updateUserMessage(message){

    var chat = document.getElementById('chat');
    var userid= chat.getAttribute("userID");
    var div= document.createElement('div');
    div.setAttribute("class","message sender2");
    div.textContent=message;

    $.ajax({
        url: 'php/insertMessage.php',
        method: 'POST',
        data: { user_id: userid,message:message },
        success: function (response) {
            console.log(response);
            chat.appendChild(div);
            chat.scrollTop = chat.scrollHeight;


            
        },
        error: function (error) {
            console.error('Error checking product:', error);
        }
    });


 }

 document.getElementById('MessageInput').addEventListener('keyup',function(event){

    var mainput = document.getElementById('MessageInput');
    var msg = mainput.value;
    if(msg!=""){
        if (event.keyCode === 13) {


    
    updateUserMessage(msg);
    mainput.value="";
}
    }

 })



 function getMessagesDb(idUser){
    
    var chat = document.getElementById('chat');


    $.ajax({
        url: 'php/getMessages.php',
        method: 'POST',
        data: { user_id: idUser },
        success: function (response) {
            console.log(" "+response);
            var phpData = JSON.parse(response);
            if(phpData.length>chat.childElementCount){
                for (var i = chat.childElementCount; i < phpData.length; i++) {
                  var div= document.createElement('div');
              
                if(phpData[i].from==idUser){
                    div.setAttribute("class","message sender2");


                }
                else{
                    div.innerHTML=`    <img src="adminAVATAR.png" alt="Sender 1 Avatar" class="avatar">
                    `;
                    div.setAttribute("class","message sender1");

                }
                div.innerHTML+=phpData[i].message;

                chat.appendChild(div);
                chat.scrollTop = chat.scrollHeight;


             
            }
        }

        },
        error: function (error) {
            console.error('Error checking product:', error);
        }
    });

 }

  setInterval(function() {
    // Call your function here
    getMessagesDb(useridid);
}, 5000);


document.getElementById("messageIcon").addEventListener('click', function () {
    let chat = document.getElementById("chatUSER");

    // Toggle the display property
    chat.style.display = (chat.style.display === "block") ? "none" : "block";
});
