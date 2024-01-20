////////////////////////////////////////////////// CategorysChart ////////////////////////////////////
function searchChartCategories(label , dataa){
    var ctx = document.getElementById('CategorysChart').getContext('2d');
console.log(label);
console.log(dataa);
const labels = label;
const data = {
    labels: labels,
    datasets: [{
        label: 'How Many Sells',
        data: dataa,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension:1
    }]
};

const config = {
    type: 'line',
    data: data,
};

// Create a new instance of the Chart class
var myChart = new Chart(ctx, config);
return myChart;


}




myChartInstance =  searchChartCategories([],[]);


document.getElementById('CategoryInput').addEventListener('keydown',function(event){
    if (event.keyCode === 13) {
        const data = this.value;
        $.ajax({
            url: 'phpGetData/OneCategory.php',  // Your PHP script
            type: 'GET',
            data: { data: data },  // Data to send to PHP
            success: function(response) {
                // Handle the response from PHP
                console.log(response);
        
                if (response != 0) {
                    var label = [];
                    var dataa = [];
      
        var phpData = JSON.parse(response);
        console.log(phpData.length);

                    for (var i = 0; i < phpData.length; i++) {

                        label[i] =phpData[i].order_month;
                        dataa[i] =phpData[i].total_sold;
                    }
        
                    console.log(label);
                    console.log(dataa);
                    destroyChart(myChartInstance);

                  
        
        
                    myChartInstance = searchChartCategories(label, dataa);
                }
            },
            error: function(error) {
                // Handle errors
                console.error(error);
            }
        });
        
    }
})


////////////////////////////////////////////////////////AllCategorysChart//////////////////////////////////////////////


function allProductsChart(aLabel,dataa){
    var ctx = document.getElementById('allProductsChart').getContext('2d');
    const labels = aLabel;
const data = {
  labels: aLabel,
  datasets: [{
    label: 'Sold Products',
    data:dataa,
    backgroundColor: [
     
      'rgba(255, 205, 86, 0.2)',
    
    ],
    borderColor: [
      'rgb(255, 99, 132)'
    
    ],
    borderWidth: 1
  }]
};

const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };
  var myChart = new Chart(ctx, config);
  return myChart;
  

}
var   myChartInstance_allProductsChart;

function writeallProductsChart(data,genre)
{$.ajax({
    url: 'phpGetData/allProductChart.php',  // Your PHP script
    type: 'GET',
    data: { data: data,
    genre:genre },  // Data to send to PHP
    success: function(response) {
        // Handle the response from PHP
        console.log(response);

        if (response != 0) {
            var label = [];
            var dataa = [];

var phpData = JSON.parse(response);
console.log(phpData.length);

            for (var i = 0; i < phpData.length; i++) {

                label[i] =phpData[i].product_title;
                dataa[i] =phpData[i].total_quantity_sold;
            }

            console.log(label);
            console.log(dataa);

            
destroyChart( myChartInstance_allProductsChart);

              myChartInstance_allProductsChart = allProductsChart(label, dataa);
        }
    },
    error: function(error) {
        // Handle errors
        console.error(error);
    }
});}
writeallProductsChart(7,"All Genres");

document.getElementById('allProductsChartSelectDate').addEventListener('change',function(){
    var genre = document.getElementById('allProductsChartSelectGenre').value;
    console.log("***** "+genre);
    writeallProductsChart(this.value,genre);

})

document.getElementById('allProductsChartSelectGenre').addEventListener('change',function(){
    var data = document.getElementById('allProductsChartSelectDate').value;
    console.log("***** "+data);
    writeallProductsChart( data,this.value);

})
