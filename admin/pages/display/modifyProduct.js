// Wrap the code in a window load event handler
    // Your existing code
    function OpenForm() {
        const productForm = document.getElementById('form_product');
        console.log("opppeened");
        if (productForm) {
            productForm.style.display = "block";
        }
    }

    function closeForm() {
        const productForm = document.getElementById('form_product');
        if (productForm) {
            productForm.style.display = "none";
        }
    }
    function writeForm(jsondata){
        var productForm = document.getElementById('form_product');
        productForm.innerHTML='<div class="iconClose" > <i class="fa-regular fa-circle-xmark"></i></div>';
        productForm.innerHTML+=`	<img   onclick="uploadImage()" id="uploadedImage" src="../../../product_images/${jsondata.image_file}" alt=""> `;
        productForm.innerHTML+=`    <input name="image"  type="file" id="imageInput" style="display: none;" onchange="previewImage(event)">     `;
        productForm.innerHTML+=`	<input type="hidden" name="pid" value="${jsondata.id}">`;
        productForm.innerHTML+=`      <br><br><hr><h2>Modify a Product Form</h2><br> <div class="content_product"></div>`;
        productForm.innerHTML+=`	<label for="">Please Enter a new Title : </label>	<br><input value="${jsondata.title}" name="title" id="input_test" type="text"><br>

        <label for="">Please Enter a new Descreption : </label>	<br><input name="descreption" id="w3review"  value="${jsondata.DESCREPTION}" ><br>
        <label for="">Please Enter a new PRICE :</label>	<br><input value="${jsondata.PRIX}"  name="price" type="number"><br>
        <label for="">Please Enter a new QUANTITY : </label>	<br><input value="${jsondata.Quantity}"  name="quantity" type="number"><br>
        <label for="">Please choose the new Category : </label><br>`;
        var select = `
        <select name="category" class="classic"  id="products">
        <option  value="${jsondata.Category_name}">${jsondata.Category_name}</option>
        `;
        
        var productsContainer = document.getElementById('products');
        var categoryOptions = Array.from(productsContainer.children);
        
        for (let i = 2; i < categoryOptions.length; i++) {
            if (categoryOptions[i].innerHTML !== jsondata.Category_name) {
                select += `
                    <option value="${categoryOptions[i].innerHTML}">${categoryOptions[i].innerHTML}</option>
                `;
            }
        }
        
        select += `</select>`;
        productForm.innerHTML+=select;
        productForm.innerHTML+=`</div>
      
        <hr>
        <input value="MODIFY " name="submit" type="submit">`;


    }
 

    function FormToModify(indice) {
        var xhttp = new XMLHttpRequest();
    
        xhttp.open("POST", "gatOneProductData.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    try {
                        var responseData = JSON.parse(this.responseText);
                        console.log("Response from server:", responseData.title);
                        writeForm(responseData);
                        OpenForm();
                        document.querySelector('#form_product i').addEventListener('click',closeForm);


                        // ****************************************************************************************//
                        document.getElementById('formElement').addEventListener('submit',function(event){
                            event.preventDefault();
                            console.log("modifyy :"+indice);
                            const formData = new FormData(this);
                            const productId = indice; 
                    
                            // Send form data to PHP script for processing
                            fetch(this.getAttribute('action'), {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => {
                                    // Handle the response as needed
                                    console.log(`Product  modified successfully`);
                                    const tr = document.getElementById('tr_product_'+productId);
                                    console.log(formData.get('image').name);
                                    if(formData.get('image').name!=""){
                                    if (tr.firstElementChild) {
                        tr.children[1].innerHTML = '<img src="../../../product_images/'+formData.get('image').name+'" alt="" height="50px" width="50px">';
                    }
                    }
                    console.log(formData.get('title'));
                    tr.children[3].innerHTML= formData.get('title')  ;
                    tr.children[4].innerHTML= formData.get('price')  ;
                    tr.children[5].innerHTML= formData.get('category')  ;
                    tr.children[6].innerHTML= formData.get('quantity')  ;
                    if(formData.get('quantity')==0){
                        tr.setAttribute("class","red_row");
                    }
                    else if(formData.get('quantity')<20) {
                        tr.setAttribute("class","orange_row");
                    }
                    else if(formData.get('quantity')<50) {
                        tr.setAttribute("class","yellow_row");
                    }
                    else{
                        tr.setAttribute("class","normal");

                    }
                   closeForm();
                    document.getElementById("Product_modified").style.display = "block";
                    setTimeout(function() {
                        document.getElementById("Product_modified").style.display = "none";
                    }, 2000);
                    
                                })
                                .catch(error => {
                                    // Handle any errors that occurred during the fetch
                                    console.error(`Error modifying product:`, error);
                                });
                        });
                     


                        //******************************************************************************************/
                    } catch (error) {
                        console.error("Error parsing JSON:", error);
                    }
                } else {
                    console.error("HTTP request failed with status:", this.status);
                }
            }
        };
    
        xhttp.send("idP=" + indice);
    }

    var tdsModify = document.querySelectorAll('.forModify');
    tdsModify.forEach(function(td) {
     
        td.addEventListener('click', function() {
            id =   td.getAttribute('product-id');
            console.log("fuck "+id);
          FormToModify(id);
        });
    });

    




