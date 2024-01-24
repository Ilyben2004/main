function destroyChart(chartInstance, callback) {
  if (chartInstance) {
      chartInstance.destroy();
      if (typeof callback === 'function') {
          callback();
      }
  }
}

function searchChartCategories(label, dataa) {
  var ctx = document.getElementById('CategorysCharts').getContext('2d');
  console.log(label);
  console.log(dataa);
  const labels = label;
  const data = {
      labels: labels,
      datasets: [{
          label: 'How Many Sellss',
          data: dataa,
          fill: false,
          borderColor: 'rgba(255, 205, 86)'
      }]
  };

  const config = {
      type: 'line',
      data: data,
  };

  // Destroy the existing chart if it exists
  destroyChart(window.myChartInstance, function () {
      // Create a new instance of the Chart class
      window.myChartInstance = new Chart(ctx, config);
  });
}

var myChartInstance;

document.getElementById('CategoryInput').addEventListener('keydown', function (event) {
  if (event.keyCode === 13) {
      const data = this.value;
      $.ajax({
          url: 'phpGetData/OneCategory.php',
          type: 'GET',
          data: { data: data },
          success: function (response) {
              console.log(response);

              if (response != 0) {
                  var label = [];
                  var dataa = [];

                  var phpData = JSON.parse(response);
                  console.log(phpData.length);
                  console.log("*****************"+phpData);

                  if(phpData==data){
                             
                      noReasultsDiv();
                    
                  }
                  for (var i = 0; i < phpData.length; i++) {
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
  }
});

////////////////////////////////////////////////////////AllCategorysChart//////////////////////////////////////////////


function AllCategorysChart(aLabel,dataa){
    var ctx = document.getElementById('AllCategorysChart').getContext('2d');
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
        'rgba(255,190,86)'
    ,
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
var   myChartInstance_AllCategorysChart;

function writeAllCategorysChart(data,genre)
{$.ajax({
    url: 'phpGetData/allCategoryChart.php',  // Your PHP script
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

                label[i] =phpData[i].category_name;
                dataa[i] =phpData[i].total_quantity_sold;
            }

            console.log(label);
            console.log(dataa);

            
destroyChart( myChartInstance_AllCategorysChart);

              myChartInstance_AllCategorysChart = AllCategorysChart(label, dataa);
        }
    },
    error: function(error) {
        // Handle errors
        console.error(error);
    }
});}
writeAllCategorysChart(7,"All Genres");

document.getElementById('AllCategorysChartSelectDate').addEventListener('change',function(){
    var genre = document.getElementById('AllCategorysChartSelectGenre').value;
    console.log("***** "+genre);
    writeAllCategorysChart(this.value,genre);

})

document.getElementById('AllCategorysChartSelectGenre').addEventListener('change',function(){
    var data = document.getElementById('AllCategorysChartSelectDate').value;
    console.log("***** "+data);
    writeAllCategorysChart( data,this.value);

})

////////////////////////////////////////////////////////    CategorysRadar        //////////////////////////////////////////////





function getAllCategorys()

{
    var Categories = [];

    
    $.ajax({
    url: 'phpGetData/getAllCategories.php',  // Your PHP script
    type: 'GET',
    data: { data: 1 },  // Data to send to PHP
    success: function(response) {
        // Handle the response from PHP
        console.log(response);

        if (response != 0) {

var phpData = JSON.parse(response);
console.log(phpData.length);

            for (var i = 0; i < phpData.length; i++) {

                Categories[i] =phpData[i].Category_name;
                console.log[Categories[i]];
              
            }
           

            

        }
    },
    error: function(error) {
        // Handle errors
        console.error(error);
    }
});
return Categories;

}



var categories = getAllCategorys();




//88888888888888888888888


var   myChartInstance_CategorysRadar;


function CategorysRadar(datamale,datafemale ){
    var ctx = document.getElementById('CategorysRadar').getContext('2d');

const data = {
    labels:categories 
    ,
    datasets: [{
      label: 'Female Sells',
      data: datafemale,
      fill: true,
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      borderColor: 'rgb(255, 99, 132)',
      pointBackgroundColor: 'rgb(255, 99, 132)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(255, 99, 132)'
    }, {
      label: 'Male Sells',
      data: datamale,
      fill: true,
      backgroundColor: 'rgba(54, 162, 235, 0.2)',
      borderColor: 'rgb(54, 162, 235)',
      pointBackgroundColor: 'rgb(54, 162, 235)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(54, 162, 235)'
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

// Create a new instance of the Chart class
var myChart = new Chart(ctx, config);
return myChart;


}


function writeCategorysRada(data)
{
    $.ajax({
    url: 'phpGetData/radarCategorymale.php',  // Your PHP script
    type: 'GET',
    data: { data: data
    },  // Data to send to PHP
    success: function(response) {
        // Handle the response from PHP
        console.log(response);

        if (response != 0) {
           var datamale=new Array(categories.length).fill(0);


var phpData = JSON.parse(response);
console.log(phpData.length);

            for (var i = 0; i < phpData.length; i++) {

              datamale[phpData[i].category_id-1]= phpData[i].total_quantity_sold;
            }
            $.ajax({
                url: 'phpGetData/radarCategoryfemale.php',  // Your PHP script
                type: 'GET',
                data: { data: data
                },  // Data to send to PHP
                success: function(response) {
                    // Handle the response from PHP
                    console.log(response);
            
                    if (response != 0) {
                       var datafemale=new Array(categories.length).fill(0);;
            
            
            var phpData = JSON.parse(response);
            console.log(phpData.length);
            
                        for (var i = 0; i < phpData.length; i++) {
            
                          datafemale[phpData[i].category_id-1]= phpData[i].total_quantity_sold;
                        }
                        destroyChart(myChartInstance_CategorysRadar);
                        myChartInstance_CategorysRadar = CategorysRadar(datamale,datafemale );


            
                    }
                },
                error: function(error) {
                    // Handle errors
                    console.error(error);
                }
            }
            );

        }
    },
    error: function(error) {
        // Handle errors
        console.error(error);
    }
}
);
}
writeCategorysRada(7);

document.getElementById('CategorysRadarSelectDate').addEventListener('change',function(){
    writeCategorysRada(this.value);

})



// **************************************************************************************************************************8 //

////////////////////////////////////////////////////////    CategorysRadarLike        //////////////////////////////////////////////








var   myChartInstance_CategorysRadarLike;


function CategorysRadarLike(datamale,datafemale ){
    var ctx = document.getElementById('CategorysRadarLike').getContext('2d');

const data = {
    labels:categories 
    ,
    datasets: [{
      label: 'Female Likes',
      data: datafemale,
      fill: true,
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      borderColor: 'rgb(255, 99, 132)',
      pointBackgroundColor: 'rgb(255, 99, 132)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(255, 99, 132)'
    }, {
      label: 'Male Likes',
      data: datamale,
      fill: true,
      backgroundColor: 'rgba(54, 162, 235, 0.2)',
      borderColor: 'rgb(54, 162, 235)',
      pointBackgroundColor: 'rgb(54, 162, 235)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(54, 162, 235)'
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

// Create a new instance of the Chart class
var myChart = new Chart(ctx, config);
return myChart;


}


function writeCategorysRadaLike(data)
{
    $.ajax({
    url: 'phpGetData/radarCategoryLikemale.php',  // Your PHP script
    type: 'GET',
    data: { data: data
    },  // Data to send to PHP
    success: function(response) {
        // Handle the response from PHP
        console.log(response);

        if (response != 0) {
           var datamale=new Array(categories.length).fill(0);


var phpData = JSON.parse(response);
console.log(phpData.length);

            for (var i = 0; i < phpData.length; i++) {

              datamale[phpData[i].category_id-1]= phpData[i].total_like;
            }
            $.ajax({
                url: 'phpGetData/radarCategoryLikefemale.php',  // Your PHP script
                type: 'GET',
                data: { data: data
                },  // Data to send to PHP
                success: function(response) {
                    // Handle the response from PHP
                    console.log(response);
            
                    if (response != 0) {
                       var datafemale=new Array(categories.length).fill(0);;
            
            
            var phpData = JSON.parse(response);
            console.log(phpData.length);
          
            
                        for (var i = 0; i < phpData.length; i++) {
            
                          datafemale[phpData[i].category_id-1]= phpData[i].total_like;
                        }
                        destroyChart(myChartInstance_CategorysRadarLike);
                        myChartInstance_CategorysRadarLike = CategorysRadarLike(datamale,datafemale );


            
                    }
                },
                error: function(error) {
                    // Handle errors
                    console.error(error);
                }
            }
            );

        }
    },
    error: function(error) {
        // Handle errors
        console.error(error);
    }
}
);
}
writeCategorysRadaLike(7);

document.getElementById('CategorysRadarLikeSelectDate').addEventListener('change',function(){
    writeCategorysRadaLike(this.value);

})



// **************************************************************************************************************************8 //