function showAndHideDiv(divId, duration) {
    var myDiv = document.getElementById(divId);
    
    // Show the div
    myDiv.style.display = 'block';

    // Set a timeout to hide the div after the specified duration
    setTimeout(function () {
        myDiv.style.display = 'none';
    }, duration);
}
document.getElementById('deleteCategory').addEventListener('click', function () {
    console.log("clicked");
    var select =document.getElementById('products');

    var Category = select.value;
    console.log(Category);

    $.ajax({
        url: 'deleteCategory.php',  // Your PHP script
        type: 'GET',
        data: { Category: Category },  // Data to send to PHP
        success: function (response) {
            console.log(response);
            if (response == 1) {
                console.log("It's true");

             
                showAndHideDiv('CategoryhasProducts',3000);
            } else {
              
                var selectedOption = select.options[select.selectedIndex];

                // Remove the selected option
                if (selectedOption) {
                    select.remove(selectedOption.index);
                }        
            
            
            }
        },
        error: function (xhr, status, error) {
            // Handle errors
            console.error(xhr, status, error);
        }
    });
});
