function uploadProduct(){


  
   
  var myform = document.getElementById("myform");
  var message = document.getElementById("message");
     
     const formData = new FormData(myform);
 
 
     console.log("im in the function");
    
   console.log("heho");
 
   let isFormValid = true;
 
   if (  isNaN(formData.get('money') )||  isNaN(formData.get('Quantity') )){
     
     
     message.innerHTML = `<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 16H12.01M12 8V12M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#d34a4a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <br>Please ensure that the 'Price' and 'Quantity' fields contain numeric values. `;  console.log(formData.get('money') );
 
 
 
 
 
 
     
     console.log(formData.get('Quantity') );
     message.classList.add("class","error");
     message.style.display='block';
     message.style.color='#6a2020';
     $('#test').css("filter", "blur(5px)");
     setTimeout(function() {
      document.getElementById("message").style.display = "none";
      $('#test').css("filter", "blur(0px)");


  }, 2000);

     console.log("displayed");
     console.log(message.innerHTML);
 
 
 return;
   }
 
 
 
 
 
   formData.forEach((value, key) => {
     if (!value) {
         isFormValid = false;
         // You can also log or handle individual missing fields here if needed
         console.log(`Field ${key} is empty.`);
     }
 });
 
 
   if(isFormValid){
     fetch(myform.getAttribute('action'), {
             method: 'POST',
             body: formData
         })
         .then(response => {
             // Handle the response as needed
             console.log(`Product  added successfully`);
             const svgCode = `<svg viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>done_cover [#1485]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-259.000000, -360.000000)" fill="#206a5d"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M205.1,218 L221.9,218 L221.9,202 L205.1,202 L205.1,218 Z M203,220 L224,220 L224,200 L203,200 L203,220 Z M212.9162,213.748 L209.2034,210.212 L210.6881,208.798 L212.9162,210.92 L217.37135,206.677 L218.85605,208.091 L212.91725,213.748 L212.9162,213.747 L212.9162,213.748 Z" id="done_cover-[#1485]"> </path> </g> </g> </g> </g></svg>`;


             message.innerHTML=svgCode+"<br>Product "+formData.get('title')+" Added successfully   ";
             
             message.style.display='block';
             message.style.color='#206a5d';
             $('#test').css("filter", "blur(5px)");
             setTimeout(function() {
              document.getElementById("message").style.display = "none";
              $('#test').css("filter", "blur(0px)");
    
    
          }, 2000);



 
         
 
         })
         .catch(error => {
             // Handle any errors that occurred during the fetch
             console.error(`Error modifying product:`, error);
         });
 
     }
     else{
        
         message.innerHTML = `<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 16H12.01M12 8V12M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#d34a4a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <br>Please provide all details for this product. `;

        
         message.style.display='block';
         message.style.color="#6a2020";
         $('#test').css("filter", "blur(5px)");
         setTimeout(function() {
          document.getElementById("message").style.display = "none";
          $('#test').css("filter", "blur(0px)");


      }, 2000);

 
     }
     }
 
 
 
 
 
    