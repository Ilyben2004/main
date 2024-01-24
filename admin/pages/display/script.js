
document.addEventListener("DOMContentLoaded", function () {
  let selectMenu = document.querySelector("#products");
  let container = document.querySelector(".content_users");
  let selectprice =  document.querySelector("#priceFilter");

  let selectsells =  document.querySelector("#sellsfilter");
  let selectlikes =  document.querySelector("#likesfilter");



  fetch('get_categories.php')
  .then(response => response.json())
  .then(data => {
   data.forEach(element => {
      
    });
    selectMenu.addEventListener("change", function () {
   
      let categoryName = this.value;
     
     

      let http = new XMLHttpRequest();

      http.onreadystatechange = function () {
      
          if (this.readyState === 4 && this.status === 200) {
              let response = JSON.parse(this.responseText);
            
              let out = `
              <div class="content_users">
              <table>
              <thead>
              <tr>
                  <td>Image Product</td>
                  <td>Id</td>
                  <td>Title</td>
                 
                  <td>Price</td>
                  <td>Category</td>
                  <td>Quantity</td>
                  <td>Selled</td>
                  <td>Likes</td>

                  <td>Actions</td>
              </tr>
              </thead>
          `;
          
         if(response!=0){
         

              for (let item of response) {
                var clas = "normal";
                if (item.Quantity <= 0) {
               clas="red_row";
                }
                else if(item.Quantity <= 20){
                  clas="orange_row";
                }
                else if(item.Quantity <= 50){
                  clas="yellow_row";
                }
                  out += `<tr class="${clas}"  id="tr_product_${item.id}"`;



out += `>
  <td><img src="../../../product_images/${item.image_file}" alt="" height="50px" width="50px"></td>
  <td>${item.id}</td>
  <td>${item.title}</td>
  <td>${item.PRIX}</td>
  <td>${item.Category_name}</td>
  <td>${item.Quantity}</td>
  <td>${item.times_sold}</td>
  <td>${item.num_likes}</td>

  <td>
  <a class="forModify" product-id="${item.id}"><svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect> <path d="M42 26V40C42 41.1046 41.1046 42 40 42H8C6.89543 42 6 41.1046 6 40V8C6 6.89543 6.89543 6 8 6L22 6" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 26.7199V34H21.3172L42 13.3081L34.6951 6L14 26.7199Z" fill="#2F88FF" stroke="#000000" stroke-width="4" stroke-linejoin="round"></path> </g></svg> </a>
		<a onclick="deleteTr('${item.id}')"><svg viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="10.24"><path d="M779.5 1002.7h-535c-64.3 0-116.5-52.3-116.5-116.5V170.7h768v715.5c0 64.2-52.3 116.5-116.5 116.5zM213.3 256v630.1c0 17.2 14 31.2 31.2 31.2h534.9c17.2 0 31.2-14 31.2-31.2V256H213.3z" fill="#0452c8"></path><path d="M917.3 256H106.7C83.1 256 64 236.9 64 213.3s19.1-42.7 42.7-42.7h810.7c23.6 0 42.7 19.1 42.7 42.7S940.9 256 917.3 256zM618.7 128H405.3c-23.6 0-42.7-19.1-42.7-42.7s19.1-42.7 42.7-42.7h213.3c23.6 0 42.7 19.1 42.7 42.7S642.2 128 618.7 128zM405.3 725.3c-23.6 0-42.7-19.1-42.7-42.7v-256c0-23.6 19.1-42.7 42.7-42.7S448 403 448 426.6v256c0 23.6-19.1 42.7-42.7 42.7zM618.7 725.3c-23.6 0-42.7-19.1-42.7-42.7v-256c0-23.6 19.1-42.7 42.7-42.7s42.7 19.1 42.7 42.7v256c-0.1 23.6-19.2 42.7-42.7 42.7z" fill="#5F6379"></path></g><g id="SVGRepo_iconCarrier"><path d="M779.5 1002.7h-535c-64.3 0-116.5-52.3-116.5-116.5V170.7h768v715.5c0 64.2-52.3 116.5-116.5 116.5zM213.3 256v630.1c0 17.2 14 31.2 31.2 31.2h534.9c17.2 0 31.2-14 31.2-31.2V256H213.3z" fill="#0452c8"></path><path d="M917.3 256H106.7C83.1 256 64 236.9 64 213.3s19.1-42.7 42.7-42.7h810.7c23.6 0 42.7 19.1 42.7 42.7S940.9 256 917.3 256zM618.7 128H405.3c-23.6 0-42.7-19.1-42.7-42.7s19.1-42.7 42.7-42.7h213.3c23.6 0 42.7 19.1 42.7 42.7S642.2 128 618.7 128zM405.3 725.3c-23.6 0-42.7-19.1-42.7-42.7v-256c0-23.6 19.1-42.7 42.7-42.7S448 403 448 426.6v256c0 23.6-19.1 42.7-42.7 42.7zM618.7 725.3c-23.6 0-42.7-19.1-42.7-42.7v-256c0-23.6 19.1-42.7 42.7-42.7s42.7 19.1 42.7 42.7v256c-0.1 23.6-19.2 42.7-42.7 42.7z" fill="#5F6379"></path></g></svg></a>
		
		
          
  </td>
</tr>
`;








              }}

          
              out+=" </table> </div>";
              container.innerHTML = out;
              var tdsModify = document.querySelectorAll('.forModify');
    tdsModify.forEach(function(td) {
     
        td.addEventListener('click', function() {
            id =   td.getAttribute('product-id');
            console.log("fuck "+id);
          FormToModify(id);
        });
    });

     
              if(selectprice.value==1){
                console.log("called");
                highToLow(3);

              }
            else if (selectprice.value==2){
              console.log("called2");

              lowToHigh(3);

            }
            if(selectsells.value==1){
              console.log("called");
              highToLow(6);

            }
          else if (selectsells.value==2){
            console.log("called2");

            lowToHigh(6);

          }
          if(selectlikes.value==1){
            console.log("called");
            highToLow(7);

          }
        else if (selectlikes.value==2){
          console.log("called2");

          lowToHigh(7);

        }

       
          }
      };

      http.open('POST', "script.php", true);
      http.setRequestHeader("content-type", "application/x-www-form-urlencoded");
      http.send("category=" + categoryName);
  });
   
  })
  .catch(error => {
    console.error('Error fetching categories:', error);
  });

  
});



$(document).ready(function(){
    $('#search').on("keyup", function(){
      var getName = $(this).val();
     
      $.ajax({
        method: 'POST',
        url: 'searchajax.php',
        data: { name: getName },
        success: function(response) {
             $("#showdata").html(response);
             var tdsModify = document.querySelectorAll('.forModify');
             tdsModify.forEach(function(td) {
              
                 td.addEventListener('click', function() {
                     id =   td.getAttribute('product-id');
                     console.log("fuck "+id);
                   FormToModify(id);
                 });
             });
        } 
      });
    });
 });
 


let sourceDiv = document.querySelector('.display');
let targetDiv = document.querySelector('.menu-wrap');

// Get the computed height of the source div
let sourceHeight = window.getComputedStyle(sourceDiv).getPropertyValue('height');

// Set the height of the target div to match the height of the source div
let numericHeight = parseFloat(sourceHeight);

// Add 20 pixels to the numeric height
let adjustedHeight = numericHeight + 85;

// Set the height of the target div with the adjusted height