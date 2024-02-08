var selectedDiv;
function writeUser(username, message, idUser) {
    console.log("&**********888 : "+idUser);
    let madiv = document.getElementById('userContainer');
    var userDiv = document.createElement('div');
    userDiv.className = 'users';
    userDiv.setAttribute('idUser', idUser);

    userDiv.innerHTML = `
        <div class="imageUser"><img src="carbon.png" alt=""></div>
        <div>
            <div class="username">${username}</div>
            <div class="message">${message}</div>
        </div>
    `;

    // Add the userDiv to madiv
    madiv.appendChild(userDiv);
    userDiv.addEventListener('click',function(){
        getMessagesConv(idUser,username);
        selectedDiv=userDiv;
      
    })
}

// Event listener for userContainer





function InitialMessages(){
    let madiv = document.getElementById('userContainer');
madiv.innerHTML=``;
    $.ajax({
        url: 'getMessages.php',
        type: 'GET',
        success: function(response) {
            console.log(response);
            var phpData = JSON.parse(response);
    
            for (var i = 0; i < phpData.length; i++) {
                // Use let to create a new scope for idUser
                let idUser = (phpData[i].from === 0) ? phpData[i].to : phpData[i].from;
               let message = phpData[i].message;
                console.log(idUser);
    
                $.ajax({
                    url: 'getUsername.php',
                    type: 'GET',
                    data: { idUser: idUser },
                    success: function(response2) {
                        let username = JSON.parse(response2);
                        console.log(username);
                        console.log("I will pass: " + idUser);
                        console.log("I will pass the message : " + message);
                        writeUser(username, message, idUser);
                    },
                    error: function(error) {
                        // Handle errors in the inner AJAX request
                        console.error("Error getting username:", error);
                    }
                });
            }
    
            // Handle the response from the outer AJAX request
        },
        error: function(error) {
            // Handle errors in the outer AJAX request
            console.error(error);
        }
    });
}





 function getMessagesConv(Userid,username){
    let conversation = document.getElementById("chat");
    conversation.className="messagesShowen";
    let htmlOutput ;
    let classname;
    
    

    htmlOutput=` <div class="headerConv">
    ${username}

</div>

        <div id="conversation" class="messages">`;



    $.ajax({
        url: 'LoadConversation.php',
        type: 'GET',
        data: { idUser: Userid },
        success: function(response) {
            
            let phpData = JSON.parse(response);
            console.log(phpData);
            for(let i=0 ; i<phpData.length ; i++)
            {
                classname = (phpData[i].from === 0) ? "amessage sender" : "amessage recipient";
                let user = (phpData[i].from === 0) ? "admin" : username;
                htmlOutput+=`<div class="${classname}">
                <strong>${user} :</strong> ${phpData[i].message}
            </div>`;


        
        }
        htmlOutput+=` </div>
        </div>
        <div class="footer">
            <input type="text" placeholder="Type Your Message Here" id="messageInput">
        </div>`;
        conversation.innerHTML=htmlOutput;
        let messs= document.getElementById("conversation");
        messs.scrollTop =messs.scrollHeight;
        document.getElementById('messageInput').addEventListener('keyup',function(event){
let newmess;
newmess=this.value;
if (event.keyCode === 13) {
if(newmess!=""){

    insertMessage(newmess,Userid);
   



}
this.value="";
}

            
        })

      
        },
        error: function(error) {
            // Handle errors in the inner AJAX request
            console.error("Error getting username:", error);
        }
    });

 }






function insertMessage(message , idUser,){
    $.ajax({
        url: 'insertMessage.php',
        type: 'GET',
        data: { idUser: idUser,message:message},
        success: function(response) {
            console.log(response);
let newMessage  = document.getElementById('conversation');
let div = document.createElement('div');
div.className="amessage sender";
div.innerHTML =`    <strong>admin : </strong>${message}`;
newMessage.appendChild(div);

let messs= document.getElementById("conversation");
messs.scrollTop =messs.scrollHeight;
            

      
        },
        error: function(error) {
            // Handle errors in the inner AJAX request
            console.error("Error getting username:", error);
        }
    });



}


InitialMessages();

function refreshDiv(){
   
        selectedDiv.click();
    
}



 document.getElementById('userContainer').addEventListener('click',function(){
    refreshDiv();

 })
