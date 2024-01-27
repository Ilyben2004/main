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

 function deleteProduct(indiceProduct){
    {$.ajax({
        url: 'delete.php',  // Your PHP script
        type: 'GET',
        data: { id: indiceProduct
       },  // Data to send to PHP
        success: function(response) {
console.log(response);            
var element = document.getElementById('tr_product_'+indiceProduct);
		element.remove();
        },
        error: function(error) {
            // Handle errors
            console.error(error);
        }
    });}


 }

