var products = document.querySelectorAll('.products');
products.forEach(function(product) {
    let category = product.getAttribute('CategoryOfProduct');
    if(category!="Protein Supplements")
{
    product.style.display="none";
}
product.addEventListener("click",function(){
    document.getElementById("CategoryProducts").style.display="none";

    let id = product.getAttribute('idProduct');
    console.log(id);
    $.ajax({
        url: 'phpGetData/OneProduct.php',
        type: 'GET',
        data: { data: id },
        success: function (response) {
            console.log(response);

            if (response != 0) {
                var label = [];
                var dataa = [];

                var phpData = JSON.parse(response);
                console.log(phpData.length);
              

                for (var i = 0; i < phpData.length; i++) {
                    label[i] = phpData[i].order_month;
                    dataa[i] = phpData[i].total_sold;
                }

                console.log(label);
                console.log(dataa);

                // Call searchChart function
                destroyChart(mycharthh);
                searchChart(label, dataa);

            }
            else{
                searchChart();


            }
           

        },
        error: function (error) {
            console.error(error);
        }
    });
})

});


var cates = document.querySelectorAll('#CategoryProducts .category');
cates.forEach(function (categorie) {
    categorie.addEventListener('click', function () {
        // Step 1: Remove "choosen" class from all cates
        cates.forEach(function (categori) {
            categori.classList.remove("choosen");
        });

        // Step 2: Add "choosen" class to the clicked category
        categorie.classList.add("choosen");

        // Step 3: Show/hide products based on the selected category
        let selectedCategory = categorie.textContent.trimStart();
        console.log(selectedCategory)

        products.forEach(function (product) {
            let categoryOfProduct = product.getAttribute('CategoryOfProduct');
            product.style.display = categoryOfProduct === selectedCategory ? "block" : "none";
        });
    });
});



var catesAll = document.querySelectorAll('#AllCategorys .category');
catesAll.forEach(function (categorie) {
    categorie.addEventListener('click', function () {
            document.getElementById("AllCategorys").style.display="none";
        
        let idCate = categorie.getAttribute('idCate');
        console.log("***************************");
        console.log(idCate);

        ///////////

        $.ajax({
            url: 'phpGetData/OneCategory.php',
            type: 'GET',
            data: { data: idCate },
            success: function (response) {
                console.log(response);
  
                if (response != 0) {
                    let label = [];
                    let dataa = [];
  
                    let phpData = JSON.parse(response);
                    console.log(phpData.length);
                    console.log("*****************"+phpData);
  
                   
                    for (let i = 0; i < phpData.length; i++) {
                        label[i] = phpData[i].order_month;
                        dataa[i] = phpData[i].total_sold;
                    }
  
                    console.log(label);
                    console.log(dataa);
  
                    // Call searchChartCategories function
                    searchChartCategories(label, dataa);
                }
            },
            error: function (error) {
                console.error(error);
            }
        });




        ///////////



    })})







