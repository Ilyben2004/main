
function searchChart(label , dataa){
    var ctx = document.getElementById('searchChartProduct').getContext('2d');
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
        tension: 1
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
function destroyChart(chartInstance) {
    if (chartInstance) {
        chartInstance.destroy();
    }
}



myChartInstance =  searchChart([],[]);


document.getElementById('oneInput').addEventListener('keydown',function(event){
    if (event.keyCode === 13) {
        const data = this.value;
        $.ajax({
            url: 'phpGetData/OneProduct.php',  // Your PHP script
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

                  
        
        
                    myChartInstance = searchChart(label, dataa);
                }
            },
            error: function(error) {
                // Handle errors
                console.error(error);
            }
        });
        
    }
})









//////////////////////// allProductsChart //////////////////////////////////////////////////////////////



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


//////////////////////// allProductsLikesChart //////////////////////////////////////////////////////////////
function allProductsLikesChart(aLabel,dataa){
    var ctx = document.getElementById('allProductsLikesChart').getContext('2d');
    const labels = aLabel;
const data = {
  labels: aLabel,
  datasets: [{
    label: 'Likes Products',
    data:dataa,
    backgroundColor: [
     
      'rgba(75, 192, 192,0.2)',
    
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
var   myChartInstance_allProductsLikesChart;

function writeallProductsLikesChart(data,genre)
{$.ajax({
    url: 'phpGetData/allProductsLikesChart.php',  // Your PHP script
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

                label[i] =phpData[i].title;
                dataa[i] =phpData[i].like_count;
            }

            console.log(label);
            console.log(dataa);

            
destroyChart( myChartInstance_allProductsLikesChart);

              myChartInstance_allProductsLikesChart = allProductsLikesChart(label, dataa);
        }
    },
    error: function(error) {
        // Handle errors
        console.error(error);
    }
});}
writeallProductsLikesChart(7,"All Genres");

document.getElementById('allProductsLikesChartSelectDate').addEventListener('change',function(){
    var genre = document.getElementById('allProductsLikesChartSelectGenre').value;
    console.log("***** "+genre);
    writeallProductsLikesChart(this.value,genre);

})

document.getElementById('allProductsLikesChartSelectGenre').addEventListener('change',function(){
    var data = document.getElementById('allProductsLikesChartSelectDate').value;
    console.log("***** "+data);
    writeallProductsLikesChart( data,this.value);

})



////////////// ////////////////////////// roductsByCategorysChart   ///////////////////////////////////////////////////////////////

function ProductsByCategorysChart(aLabel,dataa){
    var ctx = document.getElementById('ProductsByCategorysChart').getContext('2d');
    const data = {
        labels:aLabel
        ,
        datasets: [{
          label: 'How Many Products By Category',
          data: dataa,
          fill: true,
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgb(255, 99, 132)',
          pointBackgroundColor: 'rgb(255, 99, 132)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgb(255, 99, 132)'
        }]
      };

      const config = {
        type: 'radar',
        data: data,
        options: {
          elements: {
            line: {
              borderWidth: 3
            }
          }
        },
      };
  var myChart = new Chart(ctx, config);
  return myChart;
  

}
var   myChartInstance_ProductsByCategorysChart;

function writeProductsByCategorysChart()
{$.ajax({
    url: 'phpGetData/ProductsByCategorysChart.php',  // Your PHP script
    type: 'GET',
    data: { data: 1 },
      // Data to send to PHP
    success: function(response) {
        // Handle the response from PHP
        console.log(response);
        console.log("sdnsdjsdsd");
        console.log(response.length)


        if (response != 0) {
            var label = [];
            var dataa = [];

var phpData = JSON.parse(response);
console.log(phpData.length);

            for (var i = 0; i < phpData.length; i++) {

                label[i] =phpData[i].Category_name;
                dataa[i] =phpData[i].product_count;
            }

            console.log(label);
            console.log(dataa);

            
destroyChart( myChartInstance_ProductsByCategorysChart);

              myChartInstance_ProductsByCategorysChart = ProductsByCategorysChart(label, dataa);
        }
    },
    error: function(error) {
        // Handle errors
        console.error(error);
    }
});}
writeProductsByCategorysChart();
