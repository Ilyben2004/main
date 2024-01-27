
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
              <td><div id="firstTdCn"><input type="checkbox" name="" id="mainChekbox"><div id="iconContiner"><i id="mainChekboxIcon" class="fa-solid fa-trash-can"></i></div></div></td>

                  <td>Image Product</td>
                  <td>Id</td>
                  <td>Title</td>
                 
                  <td>Price</td>
                  <td>Category</td>
                  <td>Quantity</td>
                  <td>Selled</td>
                  <td>Likes</td>

                  <td></td>
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
<td ><input id-product="${item.id}" type="checkbox"></td>

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
		
		
          
  </td>
</tr>
`;








              }}

          
              out+=" </table> </div>";
              container.innerHTML = out;
              //*********************************************** */
              var select = "no";

var mainCheckBox = document.getElementById('mainChekbox');
var allChecks = document.querySelectorAll('table input');

mainCheckBox.addEventListener('change', function () {
    console.log("hahaha");
    // Update the s elect variable based on the state of the main checkbox
    select = mainCheckBox.checked ? "yes" : "no";

    // Iterate through all checkboxes and set their checked property
    allChecks.forEach(function (checkbox) {
        checkbox.checked = (select === "yes");
    });
});

 document.getElementById('mainChekboxIcon').addEventListener('click',function(){
    var  confirmation = document.getElementById("delete_confirmation");
		confirmation.style.display = "block";
        document.getElementById("delete").addEventListener('click',function(){
    allChecks.forEach(function (checkbox) {
        if (checkbox.checked) {
           var idp =checkbox.getAttribute('id-product');
           console.log(idp);       
           deleteProduct(idp);
           confirmation.style.display = "none";


        }
    });
})
document.getElementById("not_delete").addEventListener('click', function() {
    confirmation.style.display = "none";


})

    

 })

              //****************************************** */
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
                highToLow(4);

              }
            else if (selectprice.value==2){
              console.log("called2");

              lowToHigh(4);

            }
            if(selectsells.value==1){
              console.log("called");
              highToLow(7);

            }
          else if (selectsells.value==2){
            console.log("called2");

            lowToHigh(7);

          }
          if(selectlikes.value==1){
            console.log("called");
            highToLow(8);

          }
        else if (selectlikes.value==2){
          console.log("called2");

          lowToHigh(8);

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
             //******************************* */
             var select = "no";

var mainCheckBox = document.getElementById('mainChekbox');
var allChecks = document.querySelectorAll('table input');

mainCheckBox.addEventListener('change', function () {
    console.log("hahaha");
    // Update the s elect variable based on the state of the main checkbox
    select = mainCheckBox.checked ? "yes" : "no";

    // Iterate through all checkboxes and set their checked property
    allChecks.forEach(function (checkbox) {
        checkbox.checked = (select === "yes");
    });
});

 document.getElementById('mainChekboxIcon').addEventListener('click',function(){
    var  confirmation = document.getElementById("delete_confirmation");
		confirmation.style.display = "block";
        document.getElementById("delete").addEventListener('click',function(){
    allChecks.forEach(function (checkbox) {
        if (checkbox.checked) {
           var idp =checkbox.getAttribute('id-product');
           console.log(idp);       
           deleteProduct(idp);
           confirmation.style.display = "none";


        }
    });
})
document.getElementById("not_delete").addEventListener('click', function() {
    confirmation.style.display = "none";


})

    

 })

           
             
             //********************************/
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